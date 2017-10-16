<?php

namespace GuilleGF\Lifx\Domain\State;

/**
 * Class State
 * @package GuilleGF\Lifx\Domain\State
 */
class State
{
    /** @var bool */
    private $connected;
    /** @var string */
    private $power;

    /**
     * State constructor.
     * @param bool $connected
     * @param string $power
     */
    public function __construct(bool $connected, string $power)
    {
        $this->connected = $connected;
        $this->setPower($power);
    }

    /**
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->connected;
    }

    /**
     * @return string
     */
    public function power(): string
    {
        return $this->power;
    }

    /**
     * @return bool
     */
    public function isPowered(): bool
    {
        return $this->power === 'on';
    }

    /**
     * @param string $power
     * @return State
     */
    private function setPower(string $power): State
    {
        if ($power !== 'on' && $power !== 'off') {
            throw new \UnexpectedValueException('Power must be on or off');
        }

        $this->power = $power;

        return $this;
    }
}
