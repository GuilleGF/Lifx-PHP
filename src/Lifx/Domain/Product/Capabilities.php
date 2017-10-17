<?php

namespace GuilleGF\Lifx\Domain\Product;

/**
 * Class Capabilities
 * @package GuilleGF\Lifx\Domain\Product
 */
class Capabilities
{
    /** @var bool */
    private $color;
    /** @var bool **/
    private $variableColorTemp;
    /** @var bool */
    private $ir;
    /** @var bool */
    private $multiZone;

    /**
     * Capabilities constructor.
     * @param bool $color
     * @param bool $variableColorTemp
     * @param bool $ir
     * @param bool $multiZone
     */
    public function __construct(bool $color, bool $variableColorTemp, bool $ir, bool $multiZone)
    {
        $this->color = $color;
        $this->variableColorTemp = $variableColorTemp;
        $this->ir = $ir;
        $this->multiZone = $multiZone;
    }

    public function hasColor(): bool
    {
        return $this->color;
    }

    public function hasVariableColorTemp(): bool
    {
        return $this->variableColorTemp;
    }

    public function hasIr(): bool
    {
        return $this->ir;
    }

    public function hasMultiZone(): bool
    {
        return $this->multiZone;
    }
}
