<?php

namespace GuilleGF\Lifx\Domain\Power;

/**
 * Class PowerOn
 * @package GuilleGF\Lifx\Domain\Power
 */
class PowerOn extends Power
{
    /**
     * PowerOn constructor.
     */
    public function __construct()
    {
        parent::__construct(self::POWER_ON);
    }
}
