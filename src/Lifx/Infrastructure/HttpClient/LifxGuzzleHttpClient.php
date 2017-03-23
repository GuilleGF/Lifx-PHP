<?php

namespace GuilleGF\Lifx\Infrastructure\HttpClient;

use GuilleGF\Lifx\LifxHttpClient;
use GuzzleHttp\Client;

/**
 * Class LifxGuzzleHttpClient
 * @package GuilleGF\Lifx\Infrastructure\HttpClient
 */
class LifxGuzzleHttpClient implements LifxHttpClient
{
    /**
     * @var \GuzzleHttp\Client The Guzzle client.
     */
    protected $guzzleClient;

    /**
     * @param \GuzzleHttp\Client|null The Guzzle client.
     */
    public function __construct()
    {
        $this->guzzleClient = new Client();
    }

    /**
     * @param string $endpoint
     * @param array $headers
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($endpoint, $headers)
    {
        $response = $this->guzzleClient->get($endpoint, $headers);

        return json_decode($response->getBody());
    }

    /**
     * @param string $endpoint
     * @param array $headers
     * @return mixed
     */
    public function post($endpoint, $headers)
    {
        return $this->guzzleClient->post($endpoint, $headers);
    }

    /**
     * @param string $endpoint
     * @param array $headers
     * @return mixed
     */
    public function put($endpoint, $headers)
    {
        return $this->guzzleClient->put($endpoint, $headers);
    }
}
