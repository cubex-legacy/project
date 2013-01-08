<?php
/**
 * Cubex Website Stub
 *
 * @author   Brooke Bryan
 */

define('PHP_START', microtime(true));

/**
 **************************************
 * Register The Composer Auto Loader  *
 **************************************
 */

$autoLoader = require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Boot Cubex
 */
Cubex::Boot($autoLoader);
