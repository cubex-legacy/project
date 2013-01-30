<?php
/**
 * @author  brooke.bryan
 */
namespace Project\Applications\Www\Views;

use Cubex\View\HtmlElement;
use Cubex\View\TemplatedViewModel;
use Project\Applications\Www\Forms\ContactUs;

class Contact extends TemplatedViewModel
{
  /**
   * @var \Project\Applications\Www\Forms\ContactUs
   */
  protected $_form;

  public function __construct()
  {
    $this->setTitle($this->t("Cubex : Form"));
    $this->_form = new ContactUs('/contact');
  }

  public function setForm(ContactUs $form)
  {
    $this->_form = $form;
    return $this;
  }

  public function form()
  {
    return $this->_form;
  }

  public function render()
  {
    $errors = '';

    $err = $this->_form->validationErrors();
    if(!empty($err))
    {
      $errors .= '<div class="alert alert-error">';
      $errors .= '<h5>The following errors occurred</h5>';
      $errors .= '<ul>';
      foreach($err as $field => $errs)
      {
        foreach($errs as $e)
        {
          $errors .= '<li>' . $e . '</li>';
        }
      }
      $errors .= '</ul></div>';
    }

    return $errors . $this->_form->render();
  }
}
