<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Applications\Www\Controllers;

use Cubex\Core\Controllers\WebpageController;
use Cubex\View\HtmlElement;
use Cubex\View\Templates\Errors\Error404;
use Project\Applications\Www\Views\Section\Header;
use Project\Applications\Www\Views\Index;

class DefaultController extends WebpageController
{

  public function preProcess()
  {
    $this->requireCss(
      'http://twitter.github.com/bootstrap/assets/css/bootstrap.css'
    );

    $this->requireJs('http://code.jquery.com/jquery-latest.js');
    $this->requireJs(
      'http://twitter.github.com/bootstrap/assets/js/bootstrap.min.js'
    );
  }

  public function renderIndex()
  {
    $this->requireCss("test");
    $this->requireJs("test");
    $this->requireCss("/test");
    $this->requireJs("/test");

    $this->nest(
      "header",
      new Header(
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
      "header",
      new Header(
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

  public function renderNotFound()
  {
    $this->webpage()->setStatusCode("404");
    return new Error404();
  }

  public function getRoutes()
  {
    return array(
      '/:magic@alpha' => 'page',
      '/'        => 'index'
    );
  }

  public function defaultAction()
  {
    return "notFound";
  }
}
