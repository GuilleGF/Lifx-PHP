<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\Label;
use PHPUnit\Framework\TestCase;

class LabelTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Selector value is required and can not be empty
     */
    public function createEmpty()
    {
        new Label('');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new Label('LivingRoom');

        $this->assertSame('label:LivingRoom', $selector->value());
        $this->assertSame('label:LivingRoom', (string)$selector);
    }
}
