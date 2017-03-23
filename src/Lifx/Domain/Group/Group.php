<?php

namespace GuilleGF\Lifx\Domain\Group;

/**
 * Class Group
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

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Group
     */
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

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Group
     */
    private function setName(string $name): Group
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Group name can not be empty');
        }

        $this->name = $name;

        return $this;
    }
}
