<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity\Primitive;

class Guarantee
{
    /**
     * @throws Breach
     */
    public static function isStringOrThrow($value): string
    {
        if (!is_string($value)) {
            throw new Breach("value provided is not a string; value=[$value]");
        }
        return $value;
    }

    /**
     * @throws Breach
     */
    public static function isNonEmptyStringOrThrow($value): string
    {
        if (!is_string($value) || $value === "") {
            throw new Breach("value provided is not a non empty string; value=[$value]");
        }
        return $value;
    }

    /**
     * @throws Breach
     */
    public static function isPositiveIngerOrThrow($value): int
    {
        if (!is_int($value) || $value < 0) {
            throw new Breach("value provided is not a non empty string; value=[$value]");
        }
        return $value;
    }
}
