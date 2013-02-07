<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Applications\Www\Forms;

use Cubex\Data\Filter\Filter;
use Cubex\Data\Validator\Validator;
use Cubex\Form\Form;
use Cubex\Form\FormElement;

class ContactUs extends Form
{
  public $name;
  public $phone;
  public $email;
  public $message;
  public $favouriteColour = '#8412b3';

  public function __construct($action = '')
  {
    parent::__construct("ContactForm", $action);
  }

  protected function _configure()
  {
    $this->setDefaultElementTemplate('<dt>{{label}}</dt><dd>{{input}}</dd>');

    $this->get("message")->setType(FormElement::TEXTAREA)->setRequired(true);

    $this->get("email")
    ->setType(FormElement::EMAIL)
    ->addValidator(Validator::VALIDATE_EMAIL)
    ->addFilter(Filter::FILTER_LOWER);

    $this->get("phone")->setType(FormElement::TEL);
    $this->get("favouritecolour")->setType(FormElement::COLOUR);

    $this->addSubmitElement("Contact Us");
    $this->get("submit")->setLabel("");
  }
}
