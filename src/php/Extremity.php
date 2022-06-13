<?php

declare(strict_types=1);

namespace DBTedman\Extremity;

use DBTedman\Extremity\Action\WPLoadedAction;
use DBTedman\Extremity\API\API;
use DBTedman\Extremity\Filter\WPHeadersFilter;
use DBTedman\Extremity\Internal\Gateway\WordPress;

class Extremity
{
    private API $api;
    private WPLoadedAction $wpLoadedAction;
    private WPHeadersFilter $wpHeadersFilter;

    public function __construct(WordPress $wp)
    {
        $this->api = new API($wp);
        $this->wpHeadersFilter = new WPHeadersFilter($wp);
        $this->wpLoadedAction = new WPLoadedAction($wp);
    }

    public function bind(): void
    {
        $this->api->bind();
        $this->wpHeadersFilter->bind();
        $this->wpLoadedAction->bind();
    }
}
