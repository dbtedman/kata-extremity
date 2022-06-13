<?php

declare(strict_types=1);

namespace DBTedman\Extremity\API;

use DBTedman\Extremity\API\Resources\CSPResource;
use DBTedman\Extremity\Internal\Gateway\WordPress;

class API
{
    // TODO: Implement WP-JSON API integration
    // TODO: /extremity/csp/report-uri


    private WordPress $wp;
    private CSPResource $cspResource;

    public function __construct(WordPress $wp)
    {
        $this->wp = $wp;
        $this->cspResource = new CSPResource($wp);
    }

    public function bind(): void
    {
        $this->defineRoutes();
    }

    private function defineRoutes(): void
    {
        $this->wp->addAction("rest_api_init", function () {
            $this->cspResource->defineRoutes();
        });
    }
}
