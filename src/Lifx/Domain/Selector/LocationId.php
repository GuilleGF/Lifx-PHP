<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class LocationId
 * @package GuilleGF\Lifx\Selector
 */
class LocationId extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'location_id:'.$this->value;
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isValid($value)
    {
        return strlen($value) === 32;
    }
}
