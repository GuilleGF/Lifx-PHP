<?php

namespace GuilleGF\Lifx\Domain\Color;

/**
 * Class Color
 */
class Color
{
    /** @var string */
    private $name;
    /** @var float */
    private $hue;
    /** @var float */
    private $saturation;
    /** @var int */
    private $kelvin;
    /** @var float */
    private $brightness;

    private $validColorNames = [
        'white', 'red', 'orange', 'yellow', 'cyan', 'green', 'blue', 'purple', 'pink'
    ];

    /**
     * @return float
     */
    public function hue(): float
    {
        return $this->hue;
    }

    /**
     * @return float
     */
    public function saturation(): float
    {
        return $this->saturation;
    }

    /**
     * @return int
     */
    public function kelvin(): int
    {
        return $this->kelvin;
    }

    /**
     * @return float
     */
    public function brightness(): float
    {
        return $this->brightness;
    }

    /**
     * @param float $hue
     * @return Color
     */
    public function setHue(float $hue): Color
    {
        if ($hue < 0 || $hue > 360) {
            throw new \OutOfRangeException('Hue must be between 0 and 360');
        }

        $this->hue = $hue;

        return $this;
    }

    /**
     * @param float $saturation
     * @return Color
     */
    public function setSaturation(float $saturation): Color
    {
        if ($saturation < 0 || $saturation > 1) {
            throw new \OutOfRangeException('Saturation must be between 0 and 1');
        }

        $this->saturation = $saturation;

        return $this;
    }

    /**
     * @param int $kelvin
     * @return Color
     */
    public function setKelvin(int $kelvin): Color
    {
        if ($kelvin < 2500 || $kelvin > 9000) {
            throw new \OutOfRangeException('Kelvin must be between 2500 and 9000');
        }

        $this->kelvin = $kelvin;

        return $this;
    }

    /**
     * @param float $brightness
     * @return Color
     */
    public function setBrightness(float $brightness): Color
    {
        if ($brightness < 0 || $brightness > 1) {
            throw new \OutOfRangeException('Brightness must be between 0 and 360');
        }

        $this->brightness = $brightness;

        return $this;
    }
}