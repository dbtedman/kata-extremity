<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Hook;

use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

/**
 * https://developer.wordpress.org/reference/hooks/wp_sitemaps_add_provider/
 *
 * Remove user listing from auto-generated sitemap.
 */
class FilterSitemap
{
    private const WP_SITEMAPS_ADD_PROVIDER = 'wp_sitemaps_add_provider';

    private WordPress $wp;

    public function __construct(WordPress $wp)
    {
        $this->wp = $wp;
    }

    public function bind(): void
    {
        $this->wp->addFilter(self::WP_SITEMAPS_ADD_PROVIDER, function ($provider, $name) {
            return ($name === 'users') ? false : $provider;
        }, 10, 2);
    }
}
