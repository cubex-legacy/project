<?php
/**
 * Cubex Website Project
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
 * Set your Cubex Environment here for when running the php build in web server
 */
if(strstr($_SERVER['SERVER_SOFTWARE'], 'Development Server'))
{
  putenv("CUBEX_ENV=development");
}

/**
 * Initiate Cubex
 */
$cubex = new \Cubex\Loader($autoLoader);

/**
 * Respond to Web Request (Cubex Returns \Cubex\Http\Response
 */
$response = $cubex->respondToWebRequest();
