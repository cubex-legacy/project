<?php
/**
 * @author  brooke.bryan
 */

namespace Sample\Applications\Www\Controllers;

use Cubex\Controllers\BaseController;

class DefaultController extends BaseController
{
  public function renderIndex()
  {
    return "Hello World";
  }

  public function defaultAction()
  {
    return "index";
  }
}
