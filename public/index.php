<?php
/**
 * Cubex Website Project
 *
 * @author Brooke Bryan
 */

define('PHP_START', microtime(true));

/**
 **************************************
 * Register The Composer Auto Loader  *
 **************************************
 */

$autoLoader = require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Initiate Cubex
 */

$cubex = new \Cubex\Core\Loader($autoLoader);

/**
 * Respond to Web Request (Cubex Returns \Cubex\Http\Response
 */

$cubex->respondToWebRequest();

/**
 * Should you wish to find out the PHP Request time
 */

/*
echo "Completed in " . number_format(
  ((\microtime(true) - PHP_START)) * 1000, 1
) . "ms";
*/
