<?php

namespace GuilleGF\Lifx\Infrastructure\HttpClient;

use GuzzleHttp\Client;

/**
 * Class LifxGuzzleHttpClient
 * @package GuilleGF\Lifx\Infrastructure\HttpClient
 */
class LifxGuzzleHttpClient
{
    /**
     * @var \GuzzleHttp\Client The Guzzle client.
     */
    protected $guzzleClient;

    /**
     * @param \GuzzleHttp\Client|null The Guzzle client.
     */
    public function __construct(Client $guzzleClient = null)
    {
        $this->guzzleClient = $guzzleClient ?: new Client();
    }
}
