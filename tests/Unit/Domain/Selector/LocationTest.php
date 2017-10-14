<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\Location;

class LocationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Selector value is required and can not be empty
     */
    public function createEmpty()
    {
        new Location('');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new Location('Home');

        $this->assertSame('location:Home', $selector->value());
        $this->assertSame('location:Home', (string)$selector);
    }
}
