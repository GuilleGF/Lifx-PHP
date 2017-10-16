<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\GroupId;
use PHPUnit\Framework\TestCase;

class GroupIdTest extends TestCase
{
    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Selector group id must be 32 characters
     */
    public function createEmpty()
    {
        new GroupId('');
    }

    /**
     * @test
     * @expectedException \LengthException
     * @expectedExceptionMessage Selector group id must be 32 characters
     */
    public function createInvalidLength()
    {
        new GroupId('7289bd57734c214e8');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new GroupId('7289bd57734c214e8cf81ca8c3a22dfa');

        $this->assertSame('group_id:7289bd57734c214e8cf81ca8c3a22dfa', $selector->value());
        $this->assertSame('group_id:7289bd57734c214e8cf81ca8c3a22dfa', (string)$selector);
    }
}
