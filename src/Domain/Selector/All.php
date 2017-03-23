<?php

namespace GuilleGF\Lifx\Selector;

/**
 * Class All
 */
class All extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'all';
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isValid($value)
    {
        return true;
    }
}
