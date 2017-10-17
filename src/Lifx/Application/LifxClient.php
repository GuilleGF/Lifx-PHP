<?php

namespace GuilleGF\Lifx\Application;

use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Power\Power;
use GuilleGF\Lifx\Domain\Selector\SelectorCollection;
use GuilleGF\Lifx\Domain\State\State;
use GuilleGF\Lifx\Infrastructure\HttpClient\LifxHttpClient;

/**
 * Class LifxClient
 * @package GuilleGF\Lifx\Application
 */
class LifxClient
{
    const BASE_URI = 'https://api.lifx.com';
    const VERSION = 'v1';

    /** @var LifxHttpClient */
    private $httpClient;
    /** @var string */
    private $appToken;

    /**
     * LifxClient constructor.
     * @param LifxHttpClient $httpClient
     * @param string $appToken
     */
    public function __construct(LifxHttpClient $httpClient, $appToken)
    {
        $this->httpClient = $httpClient;
        $this->appToken = $appToken;
    }

    /**
     * @param SelectorCollection $selectors
     * @return mixed
     */
    public function lights(SelectorCollection $selectors)
    {
        return $this->httpClient->get(
            $this->ulr('lights', $selectors),
            $this->headers()
        );
    }

    /**
     * @param SelectorCollection $selectors
     * @param State $state
     * @return mixed
     */
    public function setState(SelectorCollection $selectors, State $state)
    {
        return $this->httpClient->put(
            $this->ulr('lights', $selectors),
            $this->headers(),
            $state
        );
    }

    /**
     * @param SelectorCollection $selectors
     * @param Color $color
     * @return mixed
     */
    public function setColor(SelectorCollection $selectors, Color $color)
    {
        return $this->httpClient->put(
            $this->ulr('lights', $selectors),
            $this->headers(),
            $color
        );
    }

    /**
     * @param SelectorCollection $selectors
     * @param Power $power
     * @return mixed
     */
    public function setPower(SelectorCollection $selectors, Power $power)
    {
        return $this->httpClient->put(
            $this->ulr('lights', $selectors),
            $this->headers(),
            $power
        );
    }

    /**
     * @param string $method
     * @param SelectorCollection $selectors
     * @param string $action
     * @return string
     */
    private function ulr(string $method, SelectorCollection $selectors, string $action = ''): string
    {
        return implode('/', [self::BASE_URI, self::VERSION, $method, $selectors, $action]);
    }

    /**
     * @return array
     */
    private function headers(): array
    {
        return ['Authorization' => 'Bearer '.$this->appToken];
    }
}
