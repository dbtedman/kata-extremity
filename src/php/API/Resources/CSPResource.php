<?php

declare(strict_types=1);

namespace DBTedman\Extremity\API\Resources;

use DBTedman\Extremity\API\Routable;
use DBTedman\Extremity\Internal\Domain\Entity\CSPReport\CSPReport;
use DBTedman\Extremity\Internal\Domain\Entity\CSPReport\InvalidCSPReport;
use DBTedman\Extremity\Internal\Domain\Entity\Primitive\Collection;
use DBTedman\Extremity\Internal\Domain\Entity\SuspiciousBehaviour\SuspiciousBehaviourFromCSP;
use DBTedman\Extremity\Internal\Domain\UseCase\AlertSuspiciousBehaviour\AlertSuspiciousBehaviour;
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

    public function captureFromReportURI(WP_REST_Request $request): WP_REST_Response
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

        $rawReport = Collection::value($data, "csp-report", []);

        if ($rawReport === []) {
            $response->set_status(400);
            return $response;
        }

        try {
            $report = new CSPReport(
                Collection::value($rawReport, "document-uri"),
                Collection::value($rawReport, "referrer"),
                Collection::value($rawReport, "violated-directive"),
                Collection::value($rawReport, "effective-directive"),
                Collection::value($rawReport, "original-policy"),
                Collection::value($rawReport, "blocked-uri"),
                Collection::value($rawReport, "status-code"),
            );
        } catch (InvalidCSPReport $e) {
            $response->set_status(400);
            return $response;
        }

        $useCase = new AlertSuspiciousBehaviour();
        $useCase->execute(new SuspiciousBehaviourFromCSP($report));

        $response->set_status(200);
        return $response;
    }
}
