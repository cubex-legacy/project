<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Cli;

use Cubex\Cli\CliCommand;
use Cubex\Cli\Shell;

class Example extends CliCommand
{
  public function execute()
  {
    echo Shell::colourText(
      "Cubex CLI Example",
      Shell::COLOUR_FOREGROUND_LIGHT_GREEN
    );
    $this->_cliOut();
  }

  public function alternative()
  {
    echo Shell::colourText(
      "Cubex CLI Example",
      Shell::COLOUR_FOREGROUND_LIGHT_CYAN
    );
    $this->_cliOut();
  }

  protected function _cliOut()
  {
    echo "\nThis is an example CLI Command\n";
  }
}
