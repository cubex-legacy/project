<?php
/**
 * @author  brooke.bryan
 */

namespace Project;

class Project extends \Cubex\Core\Project\Project
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
   * @return \Cubex\Core\Application\Application
   */
  public function defaultApplication()
  {
    return new Applications\Www\WwwApplication();
  }
}
