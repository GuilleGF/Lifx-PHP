<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\SceneId;
use PHPUnit\Framework\TestCase;

class SceneIdTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Selector scene uuid format is invalid
     */
    public function createEmpty()
    {
        new SceneId('');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Selector scene uuid format is invalid
     */
    public function createInvalidFormat()
    {
        new SceneId('7289bd57734c214e8cf81ca8c3a22dfa');
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = new SceneId('0f8a3088-a22d-473c-b45e-0a4102b8f6d2');

        $this->assertSame('scene_id:0f8a3088-a22d-473c-b45e-0a4102b8f6d2', $selector->value());
        $this->assertSame('scene_id:0f8a3088-a22d-473c-b45e-0a4102b8f6d2', (string)$selector);
    }
}
