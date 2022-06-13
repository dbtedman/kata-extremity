<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity;

interface HTTPHeader
{
    public function name(): string;

    public function value(): string;
}
