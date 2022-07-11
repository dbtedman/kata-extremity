<?php

namespace DBTedman\Extremity\Hook;

use DBTedman\Extremity\Internal\Domain\UseCase\DefineSecurityHeaders\DefineSecurityHeaders;
use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

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
        $this->wp->addFilter(self::WP_HEADERS, function (array $headers) {
            $useCase = new DefineSecurityHeaders();

            foreach ($useCase->execute() as $item) {
                $headers[$item->name()] = $item->value();
            }

            return $headers;
        });
    }
}
