<?php

namespace GuilleGF\Lifx\Application;

use GuilleGF\Lifx\Application\Processor\LightsProcessor;
use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Light\Light;
use GuilleGF\Lifx\Domain\Light\LightCollection;
use GuilleGF\Lifx\Domain\Power\PowerOff;
use GuilleGF\Lifx\Domain\Power\PowerOn;
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
    /** @var LightsProcessor */
    private $processor;

    /**
     * Lifx constructor.
     * @param string $appToken
     */
    public function __construct(string $appToken)
    {
        $this->client = new LifxClient(
            HttpClientFactory::create(),
            $appToken
        );
        $this->processor = LightsProcessor::getInstance();
    }

    public function lights(): LightCollection
    {
        $lights = $this->client->lights(new SelectorCollection([new All()]));

        return $this->processor->process($lights);
    }

    public function light(string $id): LightCollection
    {
        $lights = $this->client->lights(new SelectorCollection([new Id($id)]));

        return $this->processor->process($lights);
    }

    public function findLight(SelectorCollection $selectorCollection): LightCollection
    {
        return $this->client->lights($selectorCollection);
    }

    public function powerOff(Light $light)
    {
        $this->client->setPower($this->selectorByLight($light), new PowerOff());
    }

    public function powerOn(Light $light)
    {
        $this->client->setPower($this->selectorByLight($light), new PowerOn());
    }

    public function setColor(Light $light, Color $color): Light
    {
        try {
            $this->client->setColor($this->selectorByLight($light), $color);

            return $light;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    private function selectorByLight(Light $light): SelectorCollection
    {
        return new SelectorCollection([new Id($light->id())]);
    }
}
