<?php

declare(strict_types=1);

namespace DBTedman\Extremity;

use DBTedman\Extremity\API\API;
use DBTedman\Extremity\Hook\Hooks;
use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class Extremity
{
    private API $api;
    private Hooks $hooks;

    public function __construct(WordPress $wp)
    {
        $this->api = new API($wp);
        $this->hooks = new Hooks($wp);
    }

    public function bind(): void
    {
        $this->api->bind();
        $this->hooks->bind();
    }
}
