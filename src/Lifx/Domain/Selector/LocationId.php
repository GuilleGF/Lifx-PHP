<?php

namespace GuilleGF\Lifx\Domain\Selector;

use GuilleGF\Lifx\Domain\Validator\Validator;

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
        if (!Validator::hash32($value)) {
            throw new \LengthException('Selector location id must be 32 characters');
        }

        return parent::isValid($value);
    }
}
