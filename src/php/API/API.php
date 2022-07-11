<?php

declare(strict_types=1);

namespace DBTedman\Extremity\API;

use DBTedman\Extremity\API\Resources\CSPResource;
use DBTedman\Extremity\Internal\Gateway\WordPress\WordPress;

class API
{
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
        $this->hideRoutes();
    }

    private function defineRoutes(): void
    {
        $this->wp->addAction("rest_api_init", function () {
            $this->cspResource->defineRoutes();
        });
    }

    private function hideRoutes(): void
    {
        $this->wp->addFilter("rest_endpoints", function ($api) {
            $this->fromAPIHideRoute($api, "/wp/v2/users");
            $this->fromAPIHideRoute($api, "/wp/v2/users/(?P<id>[\d]+)");
            $this->fromAPIHideRoute($api, "/wp/v2/users/me");

            return $api;
        });
    }

    /**
     * @param array $api
     * @param string $route
     */
    private function fromAPIHideRoute(array &$api, string $route)
    {
        if (isset($api[$route])) {
            unset($api[$route]);
        }
    }
}
