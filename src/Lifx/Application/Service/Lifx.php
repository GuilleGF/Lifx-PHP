<?php

namespace GuilleGF\Lifx;

use GuilleGF\Lifx\Application\Service\LifxClient;
use GuilleGF\Lifx\Domain\Light\Light;
use GuilleGF\Lifx\Domain\Selector\All;
use GuilleGF\Lifx\Domain\Selector\SelectorCollection;
use GuilleGF\Lifx\Infrastructure\HttpClient\HttpClientFactory;

/**
 * Class Lifx
 */
class Lifx
{
    /** @var LifxClient */
    private $client;

    /**
     * Lifx constructor.
     * @param $appToken
     */
    public function __construct($appToken)
    {
        $this->client = new LifxClient(
            HttpClientFactory::create(),
            $appToken
        );


    }

    /**
     * @return Light[]
     */
    public function listAllLights()
    {
        $lights = $this->client->listLights(
            new SelectorCollection(
                [new All()]
            )
        );

        return $lights;
    }
}
