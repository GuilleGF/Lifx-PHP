<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class Location
 * @package GuilleGF\Lifx\Domain\Selector
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
