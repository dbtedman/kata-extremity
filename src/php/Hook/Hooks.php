<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Hook;

use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class Hooks
{
    private WPLoadedAction $wpLoadedAction;
    private FilterHeaders $wpHeadersFilter;
    private FilterSitemap $filterSitemap;

    public function __construct(WordPress $wp)
    {
        $this->wpLoadedAction = new WPLoadedAction($wp);
        $this->wpHeadersFilter = new FilterHeaders($wp);
        $this->filterSitemap = new FilterSitemap($wp);
    }

    public function bind(): void
    {
        $this->wpLoadedAction->bind();
        $this->wpHeadersFilter->bind();
        $this->filterSitemap->bind();
    }
}
