<?php
/**
 * @author  brooke.bryan
 */

namespace Project;

class Project extends \Cubex\Project\Project
{
  /**
   * Project Name
   *
   * @return string
   */
  public function name()
  {
    return "Project Name";
  }

  /**
   * @return \Cubex\Application\Application
   */
  public function defaultApplication()
  {
    return new Applications\Www\WwwApplication();
  }
}
