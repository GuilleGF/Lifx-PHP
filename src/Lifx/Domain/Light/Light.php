<?php

namespace GuilleGF\Lifx\Domain\Light;

use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Group\Group;
use GuilleGF\Lifx\Domain\Location\Location;
use GuilleGF\Lifx\Domain\Power\Power;
use GuilleGF\Lifx\Domain\Product\Product;
use GuilleGF\Lifx\Domain\Validator\Validator;

/**
 * Class Light
 * @package GuilleGF\Lifx\Domain\Light
 */
class Light
{
    /** @var string */
    private $id;
    /** @var string */
    private $uuid;
    /** @var string */
    private $label;
    /** @var bool */
    private $connected;
    /** @var Power */
    private $power;
    /** @var Color */
    private $color;
    /** @var Group */
    private $group;
    /** @var Location */
    private $location;
    /** @var Product */
    private $product;

    /**
     * Light constructor.
     * @param string $id
     * @param string $uuid
     * @param string $label
     * @param bool $connected
     * @param Power $power
     * @param Color $color
     * @param Group $group
     * @param Location $location
     * @param Product $product
     */
    public function __construct(
        string $id,
        string $uuid,
        string $label,
        bool $connected,
        Power $power,
        Color $color,
        Group $group,
        Location $location,
        Product $product
    ) {
        $this->setId($id);
        $this->setUuid($uuid);
        $this->setLabel($label);
        $this->connected = $connected;
        $this->power = $power;
        $this->color = $color;
        $this->group = $group;
        $this->location = $location;
        $this->product = $product;
    }

    public function id(): string
    {
        return $this->id;
    }

    private function setId(string $id): Light
    {
        if (!Validator::hash12($id)) {
            throw new \InvalidArgumentException('Light id must be valid format');
        }

        $this->id = $id;

        return $this;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    private function setUuid(string $uuid): Light
    {
        if (!Validator::UUID($uuid)) {
            throw new \InvalidArgumentException('Light uuid must be a valid UUID');
        }

        $this->uuid = $uuid;

        return $this;
    }

    public function label(): string
    {
        return $this->label;
    }

    private function setLabel(string $label): Light
    {
        if (empty($label)) {
            throw new \InvalidArgumentException('Light label can not be empty');
        }

        $this->label = $label;

        return $this;
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }

    public function power(): Power
    {
        return $this->power;
    }

    public function isPowered(): bool
    {
        return $this->power->isPowerOn();
    }

    public function color(): Color
    {
        return $this->color;
    }

    public function group(): Group
    {
        return $this->group;
    }

    public function location(): Location
    {
        return $this->location;
    }

    public function product(): Product
    {
        return $this->product;
    }
}
