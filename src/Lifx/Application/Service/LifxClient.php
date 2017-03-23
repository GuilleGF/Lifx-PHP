<?php

namespace GuilleGF\Lifx\Application\Service;

use GuilleGF\Lifx\Domain\Selector\SelectorCollection;
use GuilleGF\Lifx\LifxHttpClient;

/**
 * Class LifxClient
 * @package GuilleGF\Lifx\Application\Service
 */
class LifxClient
{
    const BASE_URI = 'https://api.lifx.com/v1/';

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
            self::BASE_URI.'lights/'.$selectors,
            $this->headers()
        );
    }

    /**
     * @return array
     */
    private function headers()
    {
        return ['Authorization' => 'Bearer '.$this->appToken];
    }
}
