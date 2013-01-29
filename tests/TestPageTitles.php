<?php
/**
 * @author  brooke.bryan
 */
class TestPageTitles extends PHPUnit_Extensions_Selenium2TestCase
{
  protected function setUp()
  {
    $this->setBrowser('firefox');
    $this->setBrowserUrl('http://www.qbex.local/');
  }

  public function testTitle()
  {
    $this->assertContains("Index Page", $this->title());
    $this->url("/about");
    $this->assertContains("About", $this->title(), '', true);
  }
}
