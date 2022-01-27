<?php

namespace DBTedman\Extremity\Filter;

use DBTedman\Extremity\Internal\Gateway\WordPress;
use WP;

/**
 * https://developer.wordpress.org/reference/hooks/wp_headers/
 */
class WPHeadersFilter
{
    private const WP_HEADERS = "wp_headers";

    private WordPress $wp;

    public function __construct(WordPress $wp)
    {
        $this->wp = $wp;
    }

    public function bind(): void
    {
        $this->wp->addFilter(self::WP_HEADERS, function (array $headers, WP $wp) {
            return $headers;
        });
    }
}
