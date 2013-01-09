<?php
/**
 * @author  brooke.bryan
 */
namespace Sample\Applications\Www;

use Cubex\Application\Application;

class WwwApplication extends Application
{
  public function defaultDispatcher()
  {
    return 'DefaultController';
  }

  public function getNamespace()
  {
    return 'Sample\Applications\Www';
  }
}
