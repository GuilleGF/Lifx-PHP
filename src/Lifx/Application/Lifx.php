<?php

namespace GuilleGF\Lifx\Application;

use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Light\Light;
use GuilleGF\Lifx\Domain\Light\LightCollection;
use GuilleGF\Lifx\Domain\Selector\All;
use GuilleGF\Lifx\Domain\Selector\Id;
use GuilleGF\Lifx\Domain\Selector\SelectorCollection;
use GuilleGF\Lifx\Infrastructure\HttpClient\HttpClientFactory;

/**
 * Class Lifx
 * @package GuilleGF\Lifx\Application
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
     * @return LightCollection
     */
    public function lights(): array
    {
        $lights = $this->client->lights(new SelectorCollection([new All()]));

        return $lights;
    }

    /**
     * @param string $id
     * @return LightCollection
     */
    public function light(string $id): array
    {
        return $this->client->listLights(new SelectorCollection([new Id($id)]));
    }

    /**
     * @param SelectorCollection $selectorCollection
     * @return LightCollection
     */
    public function findLight(SelectorCollection $selectorCollection)
    {
        return $this->client->listLights($selectorCollection);
    }

    /**
     * @param Light $light
     * @param Color $color
     * @return Light
     */
    public function setColor(Light $light, Color $color)
    {
        return $this->client->setColor($selectorCollection);
    }
}
