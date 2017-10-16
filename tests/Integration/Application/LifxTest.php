<?php

namespace GuilleGF\Lifx\Tests\Integration\Application;

use GuilleGF\Lifx\Application\Lifx;
use PHPUnit\Framework\TestCase;

class LifxTest extends TestCase
{
    const TOKEN = 'cdfe152f8292527bddb2161a0eadc7b3d8ee3fc6ed01f9387d0159dba00cd54e';

    /** @var Lifx */
    private $lifx;

    protected function setUp()
    {
        $this->lifx = new Lifx(self::TOKEN);
    }

    /**
     * @test
     */
    public function listLights()
    {
        $lights = $this->lifx->lights();

        $this->assertGreaterThan(0, $lights);
    }
}
