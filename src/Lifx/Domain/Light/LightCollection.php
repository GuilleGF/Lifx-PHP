<?php

namespace GuilleGF\Lifx\Domain\Light;

use Atrapalo\PHPTools\Collection\EntityCollection;

/**
 * Class LightCollection
 * @package GuilleGF\Lifx\Domain\Light
 */
class LightCollection extends EntityCollection
{
    /**
     * @return string
     */
    public static function entityClass(): string
    {
        return Light::class;
    }
}
