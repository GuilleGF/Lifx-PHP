<?php

namespace GuilleGF\Lifx\Domain\Selector;

use GuilleGF\Lifx\Domain\Validator\Validator;

/**
 * Class SceneId
 * @package GuilleGF\Lifx\Domain\Selector
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

    /**
     * @param string $value
     * @return bool
     */
    protected function isValid($value)
    {
        if (!Validator::UUID($value)) {
            throw new \InvalidArgumentException('Selector scene uuid format is invalid');
        }

        return parent::isValid($value);
    }
}
