<?php

namespace GuilleGF\Lifx\Domain\Validator;

/**
 * Class Validator
 * @package GuilleGF\Lifx\Domain\Validator
 */
class Validator
{
    /**
     * @param string $uuid
     * @return bool
     */
    public static function UUID(string $uuid): bool
    {
        return preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $uuid);
    }

    /**
     * @param string $hash
     * @return bool
     */
    public static function hash32(string $hash): bool
    {
        return self::hash($hash, 32);
    }

    /**
     * @param string $hash
     * @return bool
     */
    public static function hash12(string $hash): bool
    {
        return self::hash($hash, 12);
    }

    /**
     * @param string $hash
     * @param int $length
     * @return bool
     */
    public static function hash(string $hash, int $length = 32): bool
    {
        return preg_match('/^[0-9A-F]{'.$length.'}$/i', $hash);
    }
}
