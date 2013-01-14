<?php
/**
 * @author  brooke.bryan
 */
namespace Project\Applications\Www\Views;

use Cubex\View\HtmlElement;
use Cubex\View\Impart;
use Cubex\View\Partial;
use Cubex\View\TemplatedViewModel;

class Index extends TemplatedViewModel
{
  public function __construct()
  {
    $this->setTitle($this->t("Cubex : Index Page"));
  }

  public function render()
  {
    $append = new Impart(
      '<a class="btn btn-success" href="http://cubex.io">' .
      $this->t('What is Cubex?') . '</a>'
    );

    $section = new Partial('<h4>%s</h4><p>%s</p>');
    $section->addElement(
      $this->t('Created with Partials'),
      $this->t(
        'This section was created with the partial view helper using addElement'
      )
    );
    $section->addElement(
      $this->t('Using HTMLElement'),
      $this->t(
        'As well as partials for each section, the group was compiled' .
        'using the HTMLElement helper'
      )
    );

    $secondary = HtmlElement::create('div', ['class' => 'row-fluid']);
    $secondary->nestElement('div', ['class' => 'span6'], $section);
    $secondary->nestElement('div', ['class' => 'span6'], $section);
    $secondary->renderAfter(new Impart('<hr/>'));

    return parent::render() . $secondary . $append;
  }
}
