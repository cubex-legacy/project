<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Applications\Www\Controllers;

use Cubex\Core\Controllers\WebpageController;
use Cubex\Database\ConnectionMode;
use Cubex\Facade\Redirect;
use Cubex\Form\Form;
use Cubex\Queue\StdQueue;
use Cubex\View\HtmlElement;
use Cubex\View\Templates\Errors\Error404;
use Project\Applications\Www\Forms\ContactUs;
use Project\Applications\Www\Views\Contact;
use Project\Applications\Www\Views\Section\Header;
use Project\Applications\Www\Views\Index;

class DefaultController extends WebpageController
{

  public function preProcess()
  {
    $this->requireCss(
      'http://twitter.github.com/bootstrap/assets/css/bootstrap.css'
    );
    $this->requireCss('/base');

    $this->requireJs('http://code.jquery.com/jquery-latest.js');
    $this->requireJs(
      'http://twitter.github.com/bootstrap/assets/js/bootstrap.min.js'
    );
  }


  public function renderIndex()
  {
    if($this->request()->isForm())
    {
      $q = new StdQueue("fejwh");
      \Cubex\Facade\Queue::push($q, $this->request()->postVariables());
    }

    $form = new Form("cubexformt");
    $form->addTextElement("title");
    $form->addTextareaElement("message");
    $form->addSubmitElement();
    echo $form;

    $this->nest(
      "header",
      new Header(
        $this->t('Welcome to Cubex'),
        $this->t(
          'This section has been created within the renderIndex() method'
        )
      )
    );
    echo new Index();
  }

  public function postContact()
  {
    if(Form::csrfCheck(true))
    {
      $form = new ContactUs();
      $form->hydrate($this->request()->postVariables());
      if($form->isValid())
      {
        return Redirect::to('/')->with(
          "success",
          "Thank you for contacting us"
        );
      }
      else
      {
        return $this->renderContact($form);
      }
    }
    else
    {
      throw new \Exception("Bad Csrf Check");
    }
  }

  public function renderContact(ContactUs $form = null)
  {
    $this->nest(
      "header",
      new Header(
        $this->t('Contact Us'),
        $this->t(
          'Example contact form'
        )
      )
    );
    $contact = new Contact();
    if($form !== null)
    {
      $contact->setForm($form);
    }
    return $contact;
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

    $this->setTitle($magic);

    return HtmlElement::create(
      'h2',
      [],
      ("Rendering " . $magic)
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
      '/contact'      => 'contact',
      '/:magic@alpha' => 'page',
      '/'             => 'index'
    );
  }

  public function defaultAction()
  {
    return "notFound";
  }
}
