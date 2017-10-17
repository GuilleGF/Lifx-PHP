<?php

namespace GuilleGF\Lifx\Tests\Funtional\Application\Service\Processor;

use GuilleGF\Lifx\Application\Processor\LightsProcessor;
use GuilleGF\Lifx\Domain\Light\Light;
use PHPUnit\Framework\TestCase;

/**
 * Class LightsResponseTest
 * @package GuilleGF\Lifx\Tests\Funtional\Application\Service\Processor
 */
class LightsResponseTest extends TestCase
{
    /** @var LightsProcessor */
    private $processor;

    protected function setUp()
    {
        $this->processor = LightsProcessor::getInstance();
    }

    /**
     * @test
     */
    public function processEmptyResponse()
    {
        $this->assertEmpty($this->processor->process(""));
    }

    /**
     * @test
     */
    public function processOneLight()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../../../Mocks/listLights.json'));
        $lights = $this->processor->process($data);

        $this->assertInstanceOf(Light::class, $lights->first());
    }
}
