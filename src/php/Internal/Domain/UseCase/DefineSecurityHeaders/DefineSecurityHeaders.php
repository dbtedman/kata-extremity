<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\UseCase\DefineSecurityHeaders;

use DBTedman\Extremity\Internal\Domain\Entity\HTTPHeader\ContentSecurityPolicyHTTPHeader;
use DBTedman\Extremity\Internal\Domain\Entity\HTTPHeader\HTTPHeader;
use DBTedman\Extremity\Internal\Domain\Entity\HTTPHeader\SimpleHTTPHeader;

class DefineSecurityHeaders
{
    /**
     * @return array|HTTPHeader[]
     */
    public function execute(): array
    {
        $headers = [];

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options
        $headers[] = new SimpleHTTPHeader("X-Frame-Options", "SAMEORIGIN");

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Content-Type-Options
        $headers[] = new SimpleHTTPHeader("X-Content-Type-Options", "nosniff");

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy
        $headers[] = new ContentSecurityPolicyHTTPHeader();

        return $headers;
    }
}
