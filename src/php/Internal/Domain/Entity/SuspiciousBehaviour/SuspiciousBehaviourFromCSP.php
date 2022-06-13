<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity\SuspiciousBehaviour;

use DBTedman\Extremity\Internal\Domain\Entity\CSPReport\CSPReport;

class SuspiciousBehaviourFromCSP implements SuspiciousBehaviour
{
    private CSPReport $report;

    public function __construct(CSPReport $report)
    {
        $this->report = $report;
    }

    public function uniqueIdentifierForTypeOfSuspiciousBehaviour(): string
    {
        return "CSP";
    }

    public function uriWhereSuspiciousBehaviourOccurred(): string
    {
        return $this->report->documentUri();
    }
}
