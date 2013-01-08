<?php
/**
 * Cubex Website Stub
 *
 * @author   Brooke Bryan
 */

define('PHP_START', microtime(true));

error_reporting(E_ALL);
ini_set('display_errors',true);

/**
 **************************************
 * Register The Composer Auto Loader  *
 **************************************
 */

$autoLoader = require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Boot Cubex
 */
$cubex = new \Cubex\Core\Loader($autoLoader);
$cubex->launch();
