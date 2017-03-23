<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class All
 */
class All extends Selector
{
    /**
     * All constructor.
     */
    public function __construct()
    {
        parent::__construct('');
    }

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
