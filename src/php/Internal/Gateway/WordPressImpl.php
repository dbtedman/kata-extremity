<?php

namespace DBTedman\Extremity\Internal\Gateway;

class WordPressImpl implements WordPress
{
    public function addAction(string $hookName, callable $callback, int $priority = 10): void
    {
        add_action($hookName, $callback, $priority);
    }

    public function addFilter(string $filterName, callable $callback, int $priority = 10): void
    {
        add_filter($filterName, $callback, $priority);
    }

    /**
     * @inheritDoc
     */
    public function registerRESTRoute(string $route, array $options): bool
    {
        return register_rest_route("extremity", $route, $options);
    }
}
