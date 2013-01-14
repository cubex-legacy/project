<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Applications\Www\Controllers;

use Cubex\Core\Controllers\WebpageController;
use Cubex\View\HtmlElement;
use Project\Applications\Www\Views\Section\Header;
use Project\Applications\Www\Views\Index;

class DefaultController extends WebpageController
{
  public function renderIndex()
  {
    $this->nest(
      "header", new Header(
                $this->t('Welcome to Cubex'),
                $this->t(
                  'This section has been created within the renderIndex() method'
                )
              )
    );
    return new Index();
  }

  public function renderPage($magic)
  {
    $this->nest(
      "header", new Header(
                ucwords($this->getStr("magic")),
                $this->t(
                  'This page has been dynamically generated based'
                  . ' on parameters within your url.'
                )
              )
    );
    return HtmlElement::create(
      'h2', [], "Rendering " . $magic
    );
  }

  public function getRoutes()
  {
    return array(
      '/:magic'    => 'page',
      ''           => 'index'
    );
  }

  public function defaultAction()
  {
    return "index";
  }
}
