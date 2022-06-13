<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity\Primitive;

class Collection
{
    public static function value(?array $array, string $key, $default = null)
    {
        if ($array === null) {
            return $default;
        }

        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}
