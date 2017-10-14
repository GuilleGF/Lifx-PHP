<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Location;

use GuilleGF\Lifx\Domain\Location\Location;

class LocationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Location id can not be empty
     */
    public function createEmptyId()
    {
        new Location('', '');
    }

    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Location id must be 32 characters
     */
    public function createEmptyInvalidLength()
    {
        new Location('1234567890', '');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Location name can not be empty
     */
    public function createEmptyName()
    {
        new Location('3994ce7fe01b9327fa616a5ec7fe8fa6', '');
    }

    /**
     * @test
     */
    public function create()
    {
        $location = new Location('3994ce7fe01b9327fa616a5ec7fe8fa6', 'Home');

        $this->assertSame('3994ce7fe01b9327fa616a5ec7fe8fa6', $location->id());
        $this->assertSame('Home', $location->name());
    }
}
