<?php
/**
 * @author  brooke.bryan
 */

namespace Sample;

class Project extends \Cubex\Project\Project
{
  /**
   * Project Name
   *
   * @return string
   */
  public function name()
  {
    return "Sample";
  }

  /**
   * @return \Cubex\Application\Application
   */
  public function defaultApplication()
  {
    return new Applications\Www\WwwApplication();
  }
}
