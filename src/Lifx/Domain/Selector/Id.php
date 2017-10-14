<?php

namespace GuilleGF\Lifx\Domain\Selector;

use GuilleGF\Lifx\Domain\Validator\Validator;

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

    /**
     * @param string $value
     * @return bool
     */
    protected function isValid($value)
    {
        if (!Validator::hash12($value)) {
            throw new \LengthException('Selector id must be 12 characters');
        }

        return parent::isValid($value);
    }
}
