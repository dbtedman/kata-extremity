<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Hook;

use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class Hooks
{
    private WPLoadedAction $wpLoadedAction;
    private WPHeadersFilter $wpHeadersFilter;

    public function __construct(WordPress $wp)
    {
        $this->wpLoadedAction = new WPLoadedAction($wp);
        $this->wpHeadersFilter = new WPHeadersFilter($wp);
    }

    public function bind(): void
    {
        $this->wpLoadedAction->bind();
        $this->wpHeadersFilter->bind();
    }
}
