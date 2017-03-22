<?php

namespace GuilleGF\Lifx\Selector;

/**
 * Class Group
 * @package GuilleGF\Lifx\Selector
 */
class Group extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'group:'.$this->value;
    }
}
