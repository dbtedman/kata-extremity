<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity\HTTPHeader;

class ContentSecurityPolicyHTTPHeader implements HTTPHeader
{
    private array $value = [];

    public function __construct()
    {
        $this->value[] = $this->defineDefaultSrc();
        $this->value[] = $this->defineReportURI();
    }

    public function name(): string
    {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy-Report-Only
        return "Content-Security-Policy-Report-Only";
    }

    public function value(): string
    {
        return trim(implode("; ", $this->value));
    }

    private function defineDefaultSrc(): string
    {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/default-src
        return "default-src 'self' 'unsafe-inline'";
    }

    private function defineReportURI(): string
    {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri
        // TODO: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-to
        // TODO: Ask WP for current root url
        return "report-uri http://localhost:8080/wp-json/extremity/csp/report-uri";
    }
}
