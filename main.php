<?php
/**-----------------------------------------------------------------------------
 *
 * Author URI:      https://danieltedman.com
 * Author:          Daniel Tedman
 * Description:     Secure traffic flowing in and out of your WordPress site at its extremity.
 * Plugin Name:     Extremity
 * Plugin URI:      https://github.com/dbtedman/kata-extremity
 * Text Domain:     extremity
 * Version:         0.0.0
 *
 *----------------------------------------------------------------------------*/

declare(strict_types=1);

use DBTedman\Extremity\Extremity;

// Load external PHP modules from composer, this includes the source code for
// this plugin and 3rd party libraries.
include_once(__DIR__ . '/vendor/autoload.php');

$plugin = new Extremity();
$plugin->bind();
