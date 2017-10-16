<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\Group;
use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Selector value is required and can not be empty
     */
    public function createEmpty()
    {
        new Group('');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new Group('LivingRoom');

        $this->assertSame('group:LivingRoom', $selector->value());
        $this->assertSame('group:LivingRoom', (string)$selector);
    }
}
