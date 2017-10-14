<?php

namespace GuilleGF\Lifx\Infrastructure\HttpClient;

use GuilleGF\Lifx\LifxHttpClient;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class LifxGuzzleHttpClient
 * @package GuilleGF\Lifx\Infrastructure\HttpClient
 */
class LifxGuzzleHttpClient implements LifxHttpClient
{
    /**
     * @var \GuzzleHttp\Client The Guzzle client.
     */
    private $guzzleClient;

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
     * @return mixed
     */
    public function get(string $endpoint, array $headers)
    {
        return $this->request('GET', $endpoint, ['headers' => $headers]);
    }

    /**
     * @param string $endpoint
     * @param array $headers
     * @param string $body
     * @return mixed
     */
    public function post(string $endpoint, array $headers, string $body)
    {
        return $this->request('POST', $endpoint, ['headers' => $headers, 'body' => $body]);
    }

    /**
     * @param string $endpoint
     * @param array $headers
     * @param string $body
     * @return mixed
     */
    public function put(string $endpoint, array $headers, string $body)
    {
        return $this->request('PUT', $endpoint, ['headers' => $headers, 'body' => $body]);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return string
     */
    private function request(string $method, string $endpoint, array $options)
    {
        $response = $this->guzzleClient->request($method, $endpoint, $options);

        return $this->jsonResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws \Exception
     */
    private function jsonResponse(ResponseInterface $response)
    {
        $json = json_decode($response->getBody());

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }

        return $json;
    }
}
