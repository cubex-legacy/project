<?php
namespace CubexProject\Applications\Www\Controllers;

use Cubex\Core\Controllers\WebpageController;
use Cubex\View\Templates\Errors\Error404;
use CubexProject\Applications\Www\Views\Index;

class DefaultController extends WebpageController
{

  public function preProcess()
  {
    $this->requireCssLibrary("bootstrap", 2);
    $this->requireCss('/base');
    $this->requireJsLibrary("jquery");
    $this->requireJsLibrary("bootstrap");
  }

  public function renderIndex()
  {
    $this->setTitle("Cubex : New Project");
    return new Index();
  }

  public function renderNotFound()
  {
    $this->webpage()->setStatusCode("404");
    return new Error404();
  }

  public function getRoutes()
  {
    return array(
      '/' => 'index'
    );
  }

  public function defaultAction()
  {
    return "notFound";
  }
}
