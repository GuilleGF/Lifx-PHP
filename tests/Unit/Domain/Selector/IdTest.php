<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\Id;

class IdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Selector id must be 12 characters
     */
    public function createEmpty()
    {
        new Id('');
    }

    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Selector id must be 12 characters
     */
    public function createInvalidLength()
    {
        new Id('13da7c');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new Id('13da7cd073d5');

        $this->assertSame('id:13da7cd073d5', $selector->value());
        $this->assertSame('id:13da7cd073d5', (string)$selector);
    }
}
