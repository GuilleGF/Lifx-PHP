<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class SelectorCollection
 * @package GuilleGF\Lifx\Domain\Selector
 */
class SelectorCollection implements \Countable
{
    /** @var Selector[] */
    private $selectors = [];
    /** @var string[] */
    private $selectorTypes = [];

    /**
     * SelectorCollection constructor.
     * @param Selector[] $selectors
     */
    public function __construct(array $selectors = [])
    {
        foreach ($selectors as $selector) {
            $this->add($selector);
        }
    }

    /**
     * @param Selector $selector
     */
    public function add(Selector $selector)
    {
        if (!$this->isCombinable($selector)) {
            throw new \LogicException('This selector is not combinable with the current selectors');
        }

        $this->selectors[] = $selector;
        $this->selectorTypes[] = get_class($selector);
    }

    /**
     * @return Selector[]
     */
    public function selectors(): array
    {
        return $this->selectors;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->selectors);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return implode(' ', $this->selectors);
    }

    /**
     * @param Selector $selector
     * @return bool
     */
    private function isCombinable(Selector $selector): bool
    {
        if (($selector instanceof All || $selector instanceof Id) && count($this->selectors) > 0) {
            return false;
        }
        if (in_array(All::class, $this->selectorTypes) || in_array(Id::class, $this->selectorTypes)) {
            return false;
        }

        return true;
    }
}
