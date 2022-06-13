<?php

declare(strict_types=1);

namespace DBTedman\Extremity\API;

interface Routable
{
    public function defineRoutes(): void;
}
