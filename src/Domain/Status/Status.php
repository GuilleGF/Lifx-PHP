<?php

namespace GuilleGF\Lifx\Light\Status;

/**
 * Class Status
 */
class Status
{
    /** @var bool */
    private $connected;
    /** @var string */
    private $power;

    /**
     * Status constructor.
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
     * @return Status
     */
    private function setPower(string $power): Status
    {
        if ($power !== 'on' && $power !== 'off') {
            throw new \InvalidArgumentException('Power must be on or off');
        }

        $this->power = $power;

        return $this;
    }
}
