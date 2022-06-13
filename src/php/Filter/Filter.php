<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Filter;

use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class Filter
{
    private WPHeadersFilter $wpHeadersFilter;

    public function __construct(WordPress $wp)
    {
        $this->wpHeadersFilter = new WPHeadersFilter($wp);
    }

    public function bind(): void
    {
        $this->wpHeadersFilter->bind();
    }
}
