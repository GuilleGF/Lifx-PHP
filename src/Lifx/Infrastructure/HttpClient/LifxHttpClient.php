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
    public function get($endpoint, $headers);

    /**
     * @param string $endpoint
     * @param array $headers
     * @return mixed
     */
    public function post($endpoint, $headers);

    /**
     * @param string $endpoint
     * @param array $headers
     * @return mixed
     */
    public function put($endpoint, $headers);
}