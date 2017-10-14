<?php

namespace GuilleGF\Lifx\Domain\Selector;

use GuilleGF\Lifx\Domain\Validator\Validator;

/**
 * Class GroupId
 * @package GuilleGF\Lifx\Selector
 */
class GroupId extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'group_id:'.$this->value;
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isValid($value)
    {
        if (!Validator::hash32($value)) {
            throw new \LengthException('Selector group id must be 32 characters');
        }

        return parent::isValid($value);
    }
}
