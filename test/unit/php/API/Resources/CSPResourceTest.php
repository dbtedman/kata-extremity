<?php

declare(strict_types=1);

namespace DBTedman\ExtremityTest\API\Resources;

use DBTedman\Extremity\API\Resources\CSPResource;
use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;
use Mockery;
use PHPUnit\Framework\TestCase;
use WP_REST_Request;

class CSPResourceTest extends TestCase
{
    public function testCanCaptureFromReportUri(): void
    {
        $wp = Mockery::mock(WordPress::class);
        $resource = new CSPResource($wp);
        $request = Mockery::mock(WP_REST_Request::class);
        $request
            ->shouldReceive("get_content_type")
            ->andReturn([
                "value" => "application/csp-report"
            ]);
        /** @noinspection JsonEncodingApiUsageInspection */
        $request
            ->shouldReceive("get_body")
            ->andReturn(
                json_encode([
                    "csp-report" => [
                        "document-uri" => "http://localhost:8080/",
                        "referrer" => "",
                        "violated-directive" => "style-src-attr",
                        "effective-directive" => "style-src-attr",
                        "original-policy" => "default-src 'self'; report-uri http://localhost:8080/wp-json/extremity/csp/report-uri",
                        "blocked-uri" => "inline",
                        "status-code" => 200,
                    ]
                ])
            );

        $result = $resource->captureFromReportURI($request);

        self::assertEquals(200, $result->status);
    }

    public function testHandlesIncorrectContentType(): void
    {
        $wp = Mockery::mock(WordPress::class);
        $resource = new CSPResource($wp);
        $request = Mockery::mock(WP_REST_Request::class);
        $request
            ->shouldReceive("get_content_type")
            ->andReturn([
                "value" => "application/json"
            ]);

        $result = $resource->captureFromReportURI($request);

        self::assertEquals(400, $result->status);
    }

    public function testHandlesAbsentResponseBody(): void
    {
        $wp = Mockery::mock(WordPress::class);
        $resource = new CSPResource($wp);
        $request = Mockery::mock(WP_REST_Request::class);
        $request
            ->shouldReceive("get_content_type")
            ->andReturn([
                "value" => "application/csp-report"
            ]);
        $request
            ->shouldReceive("get_body")
            ->andReturn(null);

        $result = $resource->captureFromReportURI($request);

        self::assertEquals(400, $result->status);
    }

    public function testHandlesEmptyResponseBody(): void
    {
        $wp = Mockery::mock(WordPress::class);
        $resource = new CSPResource($wp);
        $request = Mockery::mock(WP_REST_Request::class);
        $request
            ->shouldReceive("get_content_type")
            ->andReturn([
                "value" => "application/csp-report"
            ]);
        $request
            ->shouldReceive("get_body")
            ->andReturn("");

        $result = $resource->captureFromReportURI($request);

        self::assertEquals(400, $result->status);
    }

    public function testHandlesEmptyCSPReport(): void
    {
        $wp = Mockery::mock(WordPress::class);
        $resource = new CSPResource($wp);
        $request = Mockery::mock(WP_REST_Request::class);
        $request
            ->shouldReceive("get_content_type")
            ->andReturn([
                "value" => "application/csp-report"
            ]);
        /** @noinspection JsonEncodingApiUsageInspection */
        $request
            ->shouldReceive("get_body")
            ->andReturn(
                json_encode([
                    "csp-report" => []
                ])
            );

        $result = $resource->captureFromReportURI($request);

        self::assertEquals(400, $result->status);
    }
}
