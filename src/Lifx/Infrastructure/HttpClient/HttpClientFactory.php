<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 23/03/2017
 * Time: 23:59
 */

namespace GuilleGF\Lifx\Infrastructure\HttpClient;


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