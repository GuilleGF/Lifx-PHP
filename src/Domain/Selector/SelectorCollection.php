<?php

namespace GuilleGF\Lifx\Domain\Selector;

use GuilleGF\Lifx\Selector\Selector;

/**
 * Class SelectorCollection
 * @package GuilleGF\Lifx\Domain\Selector
 */
class SelectorCollection
{
    /** @var Selector[] */
    private $selectors = array();

    /**
     * SelectorCollection constructor.
     * @param Selector[] $selectors
     */
    public function __construct(array $selectors)
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
        $this->selectors[] = $selector;
    }

    /**
     * @return Selector[]
     */
    public function selectors()
    {
        return $this->selectors;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString()
    {
        $string = '';
        foreach ($this->selectors as $selector) {
            $string .= (string)$selector.' ';
        }

        return trim($string);
    }
}
