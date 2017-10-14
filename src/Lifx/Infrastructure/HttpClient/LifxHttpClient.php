<?php

namespace GuilleGF\Lifx;

/**
 * Class LifxClient
 * @package GuilleGF\Lifx
 */
interface LifxHttpClient
{
    /**
     * @param string $endpoint
     * @param array $headers
     * @return mixed
     */
    public function get(string $endpoint, array $headers);

    /**
     * @param string $endpoint
     * @param array $headers
     * @param string $body
     * @return mixed
     */
    public function post(string $endpoint, array $headers, string $body);

    /**
     * @param string $endpoint
     * @param array $headers
     * @param string $body
     * @return mixed
     */
    public function put(string $endpoint, array $headers, string $body);
}