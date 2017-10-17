<?php

namespace GuilleGF\Lifx\Application\Processor;

use GuilleGF\Lifx\Domain\Color\Color;
use GuilleGF\Lifx\Domain\Group\Group;
use GuilleGF\Lifx\Domain\Light\Light;
use GuilleGF\Lifx\Domain\Light\LightCollection;
use GuilleGF\Lifx\Domain\Location\Location;
use GuilleGF\Lifx\Domain\Power\Power;
use GuilleGF\Lifx\Domain\Product\Capabilities;
use GuilleGF\Lifx\Domain\Product\Product;

/**
 * Class LightsProcessor
 * @package GuilleGF\Lifx\Application\Processor
 */
class LightsProcessor
{
    public static function getInstance(): LightsProcessor
    {
        return new self();
    }

    public function process($response): LightCollection
    {
        $lights = new LightCollection();
        if (!is_array($response)) {
            return $lights;
        }

        foreach ($response as $lightData) {
            $power = new Power($lightData->power);
            $color = new Color(
                $lightData->color->hue,
                $lightData->color->saturation,
                $lightData->color->kelvin,
                $lightData->brightness
            );
            $group = new Group($lightData->group->id, $lightData->group->name);
            $location = new Location($lightData->location->id, $lightData->location->name);
            $product = new Product(
                $lightData->product->name,
                $lightData->product->identifier,
                $lightData->product->company,
                new Capabilities(
                    $lightData->product->capabilities->has_color,
                    $lightData->product->capabilities->has_variable_color_temp,
                    $lightData->product->capabilities->has_ir,
                    $lightData->product->capabilities->has_multizone
                )
            );

            $light = new Light(
                $lightData->id,
                $lightData->uuid,
                $lightData->label,
                $lightData->connected,
                $power,
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
