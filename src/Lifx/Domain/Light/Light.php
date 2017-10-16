<?php

namespace GuilleGF\Lifx\Domain\Light;

use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Group\Group;
use GuilleGF\Lifx\Domain\Location\Location;
use GuilleGF\Lifx\Domain\Product\Product;
use GuilleGF\Lifx\Domain\State\State;
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
    /** @var State */
    private $state;
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
     * @param State $state
     * @param Color $color
     * @param Group $group
     * @param Location $location
     * @param Product $product
     */
    public function __construct(
        string $id,
        string $uuid,
        string $label,
        State $state,
        Color $color,
        Group $group,
        Location $location,
        Product $product
    ) {
        $this->setId($id);
        $this->setUuid($uuid);
        $this->setLabel($label);
        $this->state = $state;
        $this->color = $color;
        $this->group = $group;
        $this->location = $location;
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Light
     */
    private function setId(string $id): Light
    {
        if (!Validator::hash12($id)) {
            throw new \InvalidArgumentException('Light id must be valid format');
        }

        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function uuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return Light
     */
    private function setUuid(string $uuid): Light
    {
        if (!Validator::UUID($uuid)) {
            throw new \InvalidArgumentException('Light uuid must be a valid UUID');
        }

        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string
     */
    public function label(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Light
     */
    private function setLabel(string $label): Light
    {
        if (empty($label)) {
            throw new \InvalidArgumentException('Light label can not be empty');
        }

        $this->label = $label;

        return $this;
    }

    /**
     * @return State
     */
    public function state(): State
    {
        return $this->state;
    }

    /**
     * @return Color
     */
    public function color(): Color
    {
        return $this->color;
    }

    /**
     * @return Group
     */
    public function group(): Group
    {
        return $this->group;
    }

    /**
     * @return Location
     */
    public function location(): Location
    {
        return $this->location;
    }

    /**
     * @return Product
     */
    public function product(): Product
    {
        return $this->product;
    }
}
