<?php

declare(strict_types=1);

namespace DBTedman\ExtremityTest\Internal\Domain\Entity;

use DBTedman\Extremity\Internal\Domain\Entity\SimpleHTTPHeader;
use PHPUnit\Framework\TestCase;

class SimpleHTTPHeaderTest extends TestCase
{
    public function testCanBeConstructed(): void
    {
        $headerName = "X-Frame-Options";
        $headerValue = "SAMEORIGIN";
        $result = new SimpleHTTPHeader($headerName, $headerValue);

        self::assertInstanceOf(SimpleHTTPHeader::class, $result);
        self::assertEquals($headerName, $result->name());
        self::assertEquals($headerValue, $result->value());
    }
}
