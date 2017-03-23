<?php

namespace GuilleGF\Lifx\Domain\Selector;

/**
 * Class Selector
 */
abstract class Selector
{
    /** @var string */
    protected $value;

    /**
     * Selector constructor.
     * @param string $value
     */
    public function __construct($value)
    {
        if (!$this->isValid($value)) {
            throw new \InvalidArgumentException('Selector value is required and can not be empty');
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    abstract public function value();

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value();
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isValid($value)
    {
        return !empty($value);
    }
}
