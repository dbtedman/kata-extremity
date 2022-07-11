<?php

namespace DBTedman\Extremity\Hook;

use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

/**
 * https://developer.wordpress.org/reference/hooks/wp_loaded/
 */
class WPLoadedAction
{
    private const WP_LOADED = "wp_loaded";

    private WordPress $wp;

    public function __construct(WordPress $wp)
    {
        $this->wp = $wp;
    }

    public function bind(): void
    {
        $this->wp->addAction(self::WP_LOADED, function () {
            $this->onWPLoaded();
        }, 1);
    }

    private function onWPLoaded(): void
    {
    }
}
