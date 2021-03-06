<?php

namespace DBTedman\Extremity\Internal\Gateway\WordPress;

interface WordPress
{
    /**
     * https://developer.wordpress.org/reference/functions/add_action/
     *
     * @param string $hookName
     * @param callable $callback
     * @param int $priority
     * @return void
     */
    public function addAction(string $hookName, callable $callback, int $priority = 10): void;

    /**
     * https://developer.wordpress.org/reference/functions/add_filter/
     *
     * @param string $filterName
     * @param callable $callback
     * @param int $priority
     * @param int $acceptedArgs
     * @return void
     */
    public function addFilter(string $filterName, callable $callback, int $priority = 10, int $acceptedArgs = 1): void;

    /**
     * https://developer.wordpress.org/reference/functions/register_rest_route/
     *
     * @param string $route
     * @param array $options
     * @return bool
     */
    public function registerRESTRoute(string $route, array $options): bool;
}
