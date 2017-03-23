<?php

namespace GuilleGF\Lifx\Selector;

/**
 * Class Location
 * @package GuilleGF\Lifx\Selector
 */
class Location extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'location:'.$this->value;
    }
}
