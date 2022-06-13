<?php

declare(strict_types=1);

namespace DBTedman\Extremity\Internal\Domain\UseCase\AlertSuspiciousBehaviour;

use DBTedman\Extremity\Internal\Domain\Entity\SuspiciousBehaviour\SuspiciousBehaviour;

class AlertSuspiciousBehaviour
{
    public function execute(SuspiciousBehaviour $suspiciousBehaviour): void
    {
        // TODO: Throw if reporting failed
        // TODO: Publish report to the configured "Alert Receiver" (likely something that has a queue associated perhaps)

        /** @noinspection ForgottenDebugOutputInspection */
        error_log($suspiciousBehaviour->uniqueIdentifierForTypeOfSuspiciousBehaviour());
        /** @noinspection ForgottenDebugOutputInspection */
        error_log($suspiciousBehaviour->uriWhereSuspiciousBehaviourOccurred());
    }
}
