<?php

declare(strict_types=1);

namespace DBTedman\ExtremityTest\Internal\Domain\Entity\CSPReport;

use DBTedman\Extremity\Internal\Domain\Entity\CSPReport\CSPReport;
use DBTedman\Extremity\Internal\Domain\Entity\CSPReport\InvalidCSPReport;
use PHPUnit\Framework\TestCase;

class CSPReportTest extends TestCase
{
    public function testCanBeConstructed(): void
    {
        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNotNull($report);
    }

    public function testThrowsWhenDocumentUriNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            null,
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenDocumentUriEmpty(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "",
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenReferrerNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            null,
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenViolatedDirectiveNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            null,
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenViolatedDirectiveEmpty(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenEffectiveDirectiveNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            null,
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenEffectiveDirectiveEmpty(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenOriginalPolicyNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            null,
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenOriginalPolicyEmpty(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            "",
            "inline",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenBlockedUriNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            null,
            200
        );

        static::assertNull($report);
    }

    public function testThrowsWhenBlockedUriEmpty(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "",
            200
        );

        static::assertNull($report);
    }

    public function testThrowsStatusCodeNull(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            null
        );

        static::assertNull($report);
    }

    public function testThrowsStatusCodeNegative(): void
    {
        $this->expectException(InvalidCSPReport::class);

        $report = new CSPReport(
            "http://localhost:8080/",
            "",
            "style-src-attr",
            "style-src-attr",
            "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
            "inline",
            -1
        );

        static::assertNull($report);
    }
}
