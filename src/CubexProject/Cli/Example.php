<?php
/**
 * @author  brooke.bryan
 */

namespace CubexProject\Cli;

use Cubex\Cli\CliCommand;

class Example extends CliCommand
{
  /**
   * @return int
   */
  public function execute()
  {
    echo "Hello World!\n";
  }
}
