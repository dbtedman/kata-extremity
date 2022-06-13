<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\Entity\SuspiciousBehaviour;

interface SuspiciousBehaviour
{
    public function uniqueIdentifierForTypeOfSuspiciousBehaviour(): string;

    public function uriWhereSuspiciousBehaviourOccurred(): string;
}
