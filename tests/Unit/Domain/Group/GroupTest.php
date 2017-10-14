<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Group;

use GuilleGF\Lifx\Domain\Group\Group;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Group id can not be empty
     */
    public function createEmptyId()
    {
        new Group('', '');
    }

    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Group id must be 32 characters
     */
    public function createEmptyInvalidLength()
    {
        new Group('1234567890', '');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Group name can not be empty
     */
    public function createEmptyName()
    {
        new Group('7289bd57734c214e8cf81ca8c3a22dfa', '');
    }

    /**
     * @test
     */
    public function create()
    {
        $group = new Group('7289bd57734c214e8cf81ca8c3a22dfa', 'LivingRoom');

        $this->assertSame('7289bd57734c214e8cf81ca8c3a22dfa', $group->id());
        $this->assertSame('LivingRoom', $group->name());
    }
}
