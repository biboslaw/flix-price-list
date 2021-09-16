<?php

/**
 * Plugin Name:       WebWolf Engine
 * Plugin URI:        https://webwolf.dev/
 * Description:       Customize the Wordpress instance
 * Version:           0.0.1
 * Author:            Sebastian Pieprzyk
 * Author URI:        https://webwolf.dev/
 * Text Domain:       webwolf-engine
 */

define('DEV_MODE', true);
define('WW_ENGINE_DIR', plugin_dir_path(__FILE__));
define('WW_ENGINE_URL', plugin_dir_url(__FILE__));
define('ASSETS', plugin_dir_url(__FILE__) . 'assets/build/');

include_once 'app/webwolf-bootstrap.php';