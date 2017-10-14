<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\Group;

class GroupTest extends \PHPUnit_Framework_TestCase
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
