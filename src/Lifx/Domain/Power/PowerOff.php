<?php

namespace GuilleGF\Lifx\Domain\Power;

/**
 * Class PowerOff
 * @package GuilleGF\Lifx\Domain\Power
 */
class PowerOff extends Power
{
    /**
     * PowerOff constructor.
     */
    public function __construct()
    {
        parent::__construct(self::POWER_OFF);
    }
}
