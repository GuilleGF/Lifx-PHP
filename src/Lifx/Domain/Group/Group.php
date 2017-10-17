<?php

namespace GuilleGF\Lifx\Domain\Group;

/**
 * Class Group
 * @package GuilleGF\Lifx\Domain\Group
 */
class Group
{
    /** @var string */
    private $id;
    /** @var string */
    private $name;

    /**
     * Group constructor.
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

    private function setId(string $id): Group
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('Group id can not be empty');
        } elseif (strlen($id) != 32) {
            throw new \LengthException('Group id must be 32 characters');
        }

        $this->id = $id;

        return $this;
    }

    private function setName(string $name): Group
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Group name can not be empty');
        }

        $this->name = $name;

        return $this;
    }
}
