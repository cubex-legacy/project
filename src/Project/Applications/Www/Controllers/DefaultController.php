<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Applications\Www\Controllers;

use Cubex\Controllers\BaseController;

class DefaultController extends BaseController
{
  public function renderIndex()
  {
    return "Hey";
  }

  public function renderAbout()
  {
    return "About";
  }

  public function defaultAction()
  {
    return "index";
  }

  public function getRoutes()
  {
    return array(
      '/about'    => 'about',
    );
  }
}
