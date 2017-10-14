<?php

namespace GuilleGF\Lifx\Tests\Unit\Domain\Selector;

use GuilleGF\Lifx\Domain\Selector\Location;
use GuilleGF\Lifx\Domain\Selector\All;
use GuilleGF\Lifx\Domain\Selector\GroupId;
use GuilleGF\Lifx\Domain\Selector\Id;
use GuilleGF\Lifx\Domain\Selector\Label;
use GuilleGF\Lifx\Domain\Selector\Selector;
use GuilleGF\Lifx\Domain\Selector\SelectorCollection;

class SelectorCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createEmpty()
    {
        $this->assertInstanceOf(SelectorCollection::class, new SelectorCollection());
    }

    /**
     * @test
     */
    public function create()
    {
        $selector = $this->createMockSelector(All::class, 'all');
        $selectors = new SelectorCollection([$selector]);

        $this->assertSame(1, $selectors->count());
        $this->assertSame([$selector], $selectors->selectors());
        $this->assertSame('all', $selectors->toString());
        $this->assertSame('all', (string)$selectors);
    }

    /**
     * @test
     */
    public function createMultipleSelectors()
    {
        $selector[] = $this->createMockSelector(Location::class, 'location:Home');
        $selector[] = $this->createMockSelector(Label::class, 'label:Home');
        $selector[] = $this->createMockSelector(GroupId::class, 'group_id:7289bd57734c214e8cf81ca8c3a22dfa');
        $selectors = new SelectorCollection($selector);

        $this->assertSame(3, $selectors->count());
        $this->assertSame($selector, $selectors->selectors());
        $this->assertSame('location:Home label:Home group_id:7289bd57734c214e8cf81ca8c3a22dfa', $selectors->toString());
        $this->assertSame('location:Home label:Home group_id:7289bd57734c214e8cf81ca8c3a22dfa', (string)$selectors);
    }

    /**
     * @test
     * @expectedException \LogicException
     * @expectedExceptionMessage This selector is not combinable with the current selectors
     */
    public function createNotCombinableAllFirstSelectors()
    {
        new SelectorCollection([new All(), new GroupId('7289bd57734c214e8cf81ca8c3a22dfa')]);
    }

    /**
     * @test
     * @expectedException \LogicException
     * @expectedExceptionMessage This selector is not combinable with the current selectors
     */
    public function createNotCombinableAllSecondSelectors()
    {
        new SelectorCollection([new GroupId('7289bd57734c214e8cf81ca8c3a22dfa'), new All()]);
    }

    /**
     * @test
     * @expectedException \LogicException
     * @expectedExceptionMessage This selector is not combinable with the current selectors
     */
    public function createNotCombinableIdFirstSelectors()
    {
        new SelectorCollection([new Id('13da7cd073d5'), new GroupId('7289bd57734c214e8cf81ca8c3a22dfa')]);
    }

    /**
     * @test
     * @expectedException \LogicException
     * @expectedExceptionMessage This selector is not combinable with the current selectors
     */
    public function createNotCombinableIdSecondSelectors()
    {
        new SelectorCollection([new GroupId('7289bd57734c214e8cf81ca8c3a22dfa'), new Id('13da7cd073d5')]);
    }

    /**
     * @param string $class
     * @param string $value
     * @return Selector
     */
    private function createMockSelector(string $class, string $value)
    {
        /** @var Selector|\Prophecy\Prophecy\ObjectProphecy $selector */
        $selector = $this->prophesize($class);
        $selector->__toString()->willReturn($value);

        return $selector->reveal();
    }
}
