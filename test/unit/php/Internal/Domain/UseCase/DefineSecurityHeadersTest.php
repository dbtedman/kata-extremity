<?php

declare(strict_types=1);

namespace DBTedman\ExtremityTest\Internal\Domain\UseCase;

use DBTedman\Extremity\Internal\Domain\Entity\HTTPHeader\HTTPHeader;
use DBTedman\Extremity\Internal\Domain\UseCase\DefineSecurityHeaders\DefineSecurityHeaders;
use PHPUnit\Framework\TestCase;

class DefineSecurityHeadersTest extends TestCase
{
    public function testCanExecute(): void
    {
        $useCase = new DefineSecurityHeaders();
        $result = $useCase->execute();

        self::assertIsArray($result);
        self::assertGreaterThanOrEqual(1, count($result));

        foreach ($result as $header) {
            self::assertInstanceOf(HTTPHeader::class, $header);
        }
    }
}
