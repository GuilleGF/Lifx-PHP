<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\All;
use PHPUnit\Framework\TestCase;

class AllTest extends TestCase
{
    /**
     * @test
     */
    public function create()
    {
        $selector = new All();

        $this->assertSame('all', $selector->value());
        $this->assertSame('all', (string)$selector);
    }
}
