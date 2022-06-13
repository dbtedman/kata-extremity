<?php

declare(strict_types=1);

namespace DBTedman\Extremity;

use DBTedman\Extremity\Action\Action;
use DBTedman\Extremity\API\API;
use DBTedman\Extremity\Filter\Filter;
use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class Extremity
{
    private API $api;
    private Action $action;
    private Filter $filter;

    public function __construct(WordPress $wp)
    {
        $this->action = new Action($wp);
        $this->api = new API($wp);
        $this->filter = new Filter($wp);
    }

    public function bind(): void
    {
        $this->action->bind();
        $this->api->bind();
        $this->filter->bind();
    }
}
