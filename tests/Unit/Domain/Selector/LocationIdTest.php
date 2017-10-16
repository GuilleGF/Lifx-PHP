<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\LocationId;
use PHPUnit\Framework\TestCase;

class LocationIdTest extends TestCase
{
    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Selector location id must be 32 characters
     */
    public function createEmpty()
    {
        new LocationId('');
    }

    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Selector location id must be 32 characters
     */
    public function createInvalidLength()
    {
        new LocationId('3994ce7fe01b9327');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new LocationId('3994ce7fe01b9327fa616a5ec7fe8fa6');

        $this->assertSame('location_id:3994ce7fe01b9327fa616a5ec7fe8fa6', $selector->value());
        $this->assertSame('location_id:3994ce7fe01b9327fa616a5ec7fe8fa6', (string)$selector);
    }
}
