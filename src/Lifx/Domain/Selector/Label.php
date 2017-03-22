<?php

namespace GuilleGF\Lifx\Selector;

/**
 * Class Label
 * @package GuilleGF\Lifx\Selector
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
