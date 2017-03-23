<?php

namespace GuilleGF\Lifx\Domain\Selector;

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
        return strlen($value) === 32;
    }
}
