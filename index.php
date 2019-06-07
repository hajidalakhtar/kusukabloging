<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

//Original path
require __DIR__.'/../bootstrap/autoload.php';

//Modified path
require __DIR__ . '/../kusukabloging-github/bootstrap/autoload.php';

//Original path
$app = require_once __DIR__.'/../bootstrap/app.php';

//Modified path: 2 levels up 
$app = require_once __DIR__ . '/../kusukabloging-github/bootstrap/app.php';

require_once __DIR__.'/public/index.php';
