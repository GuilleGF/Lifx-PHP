<?php

namespace GuilleGF\Lifx\Infrastructure\HttpClient;

/**
 * Class HttpClientFactory
 * @package GuilleGF\Lifx\Infrastructure\HttpClient
 */
class HttpClientFactory
{
    /**
     * @return LifxGuzzleHttpClient
     */
    public static function create()
    {
        return new LifxGuzzleHttpClient();
    }
}
