<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity;

class CSPReport
{
    private string $documentUri;
    private string $referrer;
    private string $violatedDirective;
    private string $effectiveDirective;
    private string $originalPolicy;
    private string $blockedUri;
    private int $statusCode;

    /**
     * @param string $documentUri
     * @param string $referrer
     * @param string $violatedDirective
     * @param string $effectiveDirective
     * @param string $originalPolicy
     * @param string $blockedUri
     * @param string $statusCode
     */
    public function __construct(
        string $documentUri,
        string $referrer,
        string $violatedDirective,
        string $effectiveDirective,
        string $originalPolicy,
        string $blockedUri,
        int $statusCode
    ) {
        $this->documentUri = $documentUri;
        $this->referrer = $referrer;
        $this->violatedDirective = $violatedDirective;
        $this->effectiveDirective = $effectiveDirective;
        $this->originalPolicy = $originalPolicy;
        $this->blockedUri = $blockedUri;
        $this->statusCode = $statusCode;
    }
}
