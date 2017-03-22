<?php

namespace GuilleGF\Lifx\Selector;

/**
 * Class SceneId
 * @package GuilleGF\Lifx\Selector
 */
class SceneId extends Selector
{
    /**
     * @return string
     */
    public function value()
    {
        return 'scene_id:'.$this->value;
    }
}
