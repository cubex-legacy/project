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
 * If you are unable to set your environment within a vhost, you can define
 * it using the following line of code
 *
 * putenv("CUBEX_ENV=development");
 *
 */

/**
 * Initiate Cubex
 */
$cubex = new \Cubex\Loader($autoLoader);

/**
 * Pull in Cubex Configuration
 */
$configArray = \Cubex\Foundation\Config\ConfigGroup::fromArray(
  array_replace_recursive(
    parse_ini_file(dirname(__DIR__) . '/conf/defaults.ini', true),
    parse_ini_file(dirname(__DIR__) . '/conf/' . CUBEX_ENV . '.ini', true)
  )
);

$cubex->configure($configArray);

/**
 * Respond to Web Request (Cubex Returns \Cubex\Http\Response
 */
$cubex->respondToWebRequest();

/**
 * Should you wish to find out the PHP Request time
 */

/*
echo "Completed in ";
echo number_format(((microtime(true) - PHP_START)) * 1000, 1) . "ms";
*/
