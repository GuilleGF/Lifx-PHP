<?php

namespace GuilleGF\Lifx\Application\Service;

use GuilleGF\Lifx\Domain\Selector\SelectorCollection;
use GuilleGF\Lifx\Domain\State\State;
use GuilleGF\Lifx\LifxHttpClient;

/**
 * Class LifxClient
 * @package GuilleGF\Lifx\Application\Service
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
    public function listLights(SelectorCollection $selectors)
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
    public function setLightsState(SelectorCollection $selectors, State $state)
    {
        return $this->httpClient->put(
            $this->ulr('lights', $selectors),
            $this->headers(),
            $state
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
