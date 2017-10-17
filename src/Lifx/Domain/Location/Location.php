<?php

namespace GuilleGF\Lifx\Domain\Location;

/**
 * Class Location
 * @package GuilleGF\Lifx\Domain\Location
 */
class Location
{
    /** @var string */
    private $id;
    /** @var string */
    private $name;

    /**
     * Location constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    private function setId(string $id): Location
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('Location id can not be empty');
        } elseif (strlen($id) != 32) {
            throw new \LengthException('Location id must be 32 characters');
        }

        $this->id = $id;

        return $this;
    }

    private function setName(string $name): Location
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Location name can not be empty');
        }

        $this->name = $name;

        return $this;
    }
}
