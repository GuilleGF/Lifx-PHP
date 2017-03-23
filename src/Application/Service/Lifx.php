<?php

namespace GuilleGF\Lifx;

use GuilleGF\Lifx\Selector\Selector;
use GuzzleHttp\Client;

/**
 * Class Lifx
 */
class Lifx
{
    const BASE_URI = 'https://api.lifx.com';
    const API_VERSION = 'v1';

    private $client;

    /**
     * Lifx constructor.
     * @param $appToken
     */
    public function __construct($appToken)
    {
        $this->client = new Client(array_merge_recursive([
            'base_uri' => self::BASE_URI . '/' . self::API_VERSION . '/',
            'headers' => [
                'Authorization' => 'Bearer ' . $appToken
            ]
        ]));
    }

    /**
     * @param Selector $selector
     * @return mixed
     */
    public function listLights(Selector $selector)
    {
        $response = $this->client->get('lights/' . $selector);

        //$statusCode = $response->getStatusCode();

        return json_decode($response->getBody());
    }
}
