<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Applications\Www\Controllers;

use Cubex\Controllers\BaseController;
use Cubex\Routing\Templates\ResourceTemplate;
use Project\Applications\Www\Views\Index;

class DefaultController extends BaseController
{
  public function renderIndex()
  {
    return new Index();
  }

  public function renderNew()
  {
    return "New";
  }

  public function renderEdit()
  {
    return "Edit";
  }

  public function renderUpdate()
  {
    return "Updating";
  }

  public function renderDestroy()
  {
    return "Deleting";
  }

  public function defaultAction()
  {
    return "index";
  }

  public function getRoutes()
  {
    return ResourceTemplate::getRoutes();
  }
}
