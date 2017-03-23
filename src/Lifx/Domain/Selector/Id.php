<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class Id
 * @package GuilleGF\Lifx\Selector
 */
class Id extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'id:'.$this->value;
    }
}
