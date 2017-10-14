<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\State;

use GuilleGF\Lifx\Domain\State\State;

class StateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Power must be on or off
     */
    public function createInvalidPower()
    {
        new State(true, 'turn on');
    }

    /**
     * @test
     */
    public function createConnectedAndPowerOn()
    {
        $State = new State(true, 'on');

        $this->assertTrue($State->isConnected());
        $this->assertTrue($State->isPowered());
        $this->assertSame('on', $State->power());
    }

    /**
     * @test
     */
    public function createNotConnectedAndPowerOff()
    {
        $State = new State(false, 'off');

        $this->assertFalse($State->isConnected());
        $this->assertFalse($State->isPowered());
        $this->assertSame('off', $State->power());
    }
}
