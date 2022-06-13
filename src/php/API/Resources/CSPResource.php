<?php

declare(strict_types=1);

namespace DBTedman\Extremity\API\Resources;

use DBTedman\Extremity\API\Routable;
use DBTedman\Extremity\Internal\Domain\Entity\CSPReport\CSPReport;
use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;
use JsonException;
use WP_REST_Request;
use WP_REST_Response;

class CSPResource implements Routable
{
    private WordPress $wp;

    public function __construct(WordPress $wp)
    {
        $this->wp = $wp;
    }

    public function defineRoutes(): void
    {
        // /wp-json/extremity/csp/report-uri
        $this->wp->registerRESTRoute("/csp/report-uri", [
            'methods' => 'POST',
            'callback' => function (WP_REST_Request $request) {
                return $this->captureFromReportURI($request);
            }
        ]);
    }

    private function captureFromReportURI(WP_REST_Request $request): WP_REST_Response
    {
        $response = new WP_REST_Response();

        $contentType = $request->get_content_type() ?? [];

        if (!array_key_exists("value", $contentType) || $contentType["value"] !== "application/csp-report") {
            $response->set_status(400);
            return $response;
        }

        $requestBody = $request->get_body();

        if ($requestBody === null) {
            $response->set_status(400);
            return $response;
        }

        try {
            $data = json_decode($requestBody, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $response->set_status(400);
            return $response;
        }

        $rawReport = array_key_exists("csp-report", $data) ? $data["csp-report"] : [];

        $report = new CSPReport(
            array_key_exists("document-uri", $rawReport) ? $rawReport["document-uri"] : "",
            array_key_exists("referrer", $rawReport) ? $rawReport["referrer"] : "",
            array_key_exists("violated-directive", $rawReport) ? $rawReport["violated-directive"] : "",
            array_key_exists("effective-directive", $rawReport) ? $rawReport["effective-directive"] : "",
            array_key_exists("original-policy", $rawReport) ? $rawReport["original-policy"] : "",
            array_key_exists("blocked-uri", $rawReport) ? $rawReport["blocked-uri"] : "",
            array_key_exists("status-code", $rawReport) ? $rawReport["status-code"] : -1
        );

        // TODO: Capture report

        $response->set_status(200);
        return $response;
    }
}
