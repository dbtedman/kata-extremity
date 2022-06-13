<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Action;

use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class Action
{
    private WPLoadedAction $wpLoadedAction;

    public function __construct(WordPress $wp)
    {
        $this->wpLoadedAction = new WPLoadedAction($wp);
    }

    public function bind(): void
    {
        $this->wpLoadedAction->bind();
    }
}
