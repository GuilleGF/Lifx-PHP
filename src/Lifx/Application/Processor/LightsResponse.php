<?php

namespace GuilleGF\Lifx\Application\Processor;

use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Group\Group;
use GuilleGF\Lifx\Domain\Light\Light;
use GuilleGF\Lifx\Domain\Light\LightCollection;
use GuilleGF\Lifx\Domain\Location\Location;
use GuilleGF\Lifx\Domain\Product\Product;
use GuilleGF\Lifx\Domain\State\State;

/**
 * Class LightsResponse
 * @package GuilleGF\Lifx\Application\Processor
 */
class LightsResponse
{
    public function process($response): LightCollection
    {
        $lights = new LightCollection();
        if (!is_array($response)) {
            return $lights;
        }

        foreach ($response as $lightData) {
            $state = new State($lightData->connected, $lightData->power);
            $color = new Color(
                $lightData->color->hue,
                $lightData->color->saturation,
                $lightData->color->kelvin,
                $lightData->brightness
            );
            $group = new Group($lightData->group->id, $lightData->group->name);
            $location = new Location($lightData->location->id, $lightData->location->name);
            $product = new Product();

            $light = new Light(
                $lightData->id,
                $lightData->uuid,
                $lightData->label,
                $state,
                $color,
                $group,
                $location,
                $product
            );

            $lights->add($light);
        }

        return $lights;
    }
}
