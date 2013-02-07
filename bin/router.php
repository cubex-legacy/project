<?php
/**
 * @author  brooke.bryan
 *
 * php -t public -S 0.0.0.0:8080 bin/router.php
 *
 */

$path             = $_SERVER["REQUEST_URI"];
$_GET['__path__'] = $_REQUEST['__path__'] = $path;

putenv("CUBEX_ENV=development");

require_once dirname(__DIR__) . "/public/index.php";
