<?php
/**
 * @author: brooke.bryan
 * @author: gareth.evans
 *
 * Description: Script Loader
 */
define('PHP_START', microtime(true));

/**
 **************************************
 * Register The Composer Auto Loader  *
 **************************************
 */

$autoLoader = require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Let Cubex know we're running from CLI
 */

$_SERVER['CUBEX_CLI'] = true;

/**
 * Initiate Cubex
 */

$cubex = new \Cubex\Core\Loader($autoLoader);

/**
 * Set namespace of this project
 */

$cubex->setNamespace("Sample");

/**
 * Respond to Web Request (Cubex Returns \Cubex\Http\Response
 */

$cubex->respondToCliRequest($argv);

/**
 * Should you wish to find out the PHP Request time
 */

/*
echo "Completed in " . number_format(
  ((\microtime(true) - PHP_START)) * 1000, 1
) . "ms";
*/
