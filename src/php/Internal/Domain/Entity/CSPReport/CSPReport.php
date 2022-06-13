<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity\CSPReport;

use DBTedman\Extremity\Internal\Domain\Entity\Primitive\Breach;
use DBTedman\Extremity\Internal\Domain\Entity\Primitive\Guarantee;
use DBTedman\Extremity\Internal\Domain\Entity\SuspiciousBehaviour\SuspiciousBehaviouralSource;

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
     * @param string|null $documentUri
     * @param string|null $referrer
     * @param string|null $violatedDirective
     * @param string|null $effectiveDirective
     * @param string|null $originalPolicy
     * @param string|null $blockedUri
     * @param int|null $statusCode
     * @throws InvalidCSPReport
     */
    public function __construct(
        ?string $documentUri,
        ?string $referrer,
        ?string $violatedDirective,
        ?string $effectiveDirective,
        ?string $originalPolicy,
        ?string $blockedUri,
        ?int $statusCode
    ) {
        try {
            $this->documentUri = Guarantee::isNonEmptyStringOrThrow($documentUri);
            $this->referrer = Guarantee::isStringOrThrow($referrer);
            $this->violatedDirective = Guarantee::isNonEmptyStringOrThrow($violatedDirective);
            $this->effectiveDirective = Guarantee::isNonEmptyStringOrThrow($effectiveDirective);
            $this->originalPolicy = Guarantee::isNonEmptyStringOrThrow($originalPolicy);
            $this->blockedUri = Guarantee::isNonEmptyStringOrThrow($blockedUri);
            $this->statusCode = Guarantee::isPositiveIngerOrThrow($statusCode);
        } catch (Breach $e) {
            throw new InvalidCSPReport();
        }
    }

    public function documentUri(): string
    {
        return $this->documentUri;
    }
}
