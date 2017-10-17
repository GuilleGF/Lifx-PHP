<?php

namespace GuilleGF\Lifx\Domain\Power;

use Atrapalo\PHPTools\Enum\Enum;

/**
 * Class Power
 * @package GuilleGF\Lifx\Domain\Power
 *
 * @method bool isPowerOn()
 * @method bool isPowerOff()
 */
class Power extends Enum
{
    const POWER_ON = 'on';
    const POWER_OFF = 'off';

    public static function customInvalidValueException(string $value): \Exception
    {
        throw new \UnexpectedValueException('Power must be on or off');
    }
}
