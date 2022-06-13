<?php

require_once(__DIR__ . "/../../../vendor/autoload.php");

function requireIfExists($path)
{
    if (file_exists($path)) {
        require_once($path);
    }
}

requireIfExists(__DIR__ . "/../../../wordpress/wp-includes/class-wp-http-response.php");
requireIfExists(__DIR__ . "/../../../wordpress/wp-includes/rest-api/class-wp-rest-response.php");

function absint($maybeint)
{
    return abs((int)$maybeint);
}
