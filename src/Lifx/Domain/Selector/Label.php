<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class Label
 * @package GuilleGF\Lifx\Domain\Selector
 */
class Label extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'label:'.$this->value;
    }
}
