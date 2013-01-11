<?php
/**
 * @author  brooke.bryan
 */
namespace Project\Applications\Www\Views\Section;

use Cubex\View\HtmlElement;
use Cubex\View\RenderGroup;
use Cubex\View\ViewModel;

class Header extends ViewModel
{
  private $_title = '';
  private $_lead = '';

  public function __construct($title = '', $lead = '')
  {
    $this->_title = $title;
    $this->_lead  = $lead;
  }

  public function render()
  {
    return new RenderGroup(
      HtmlElement::create('h1', [], $this->_title),
      HtmlElement::create('p', ['class' => 'lead'], $this->_lead)
    );
  }
}
