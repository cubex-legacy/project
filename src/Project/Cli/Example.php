<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Cli;

use Cubex\Cli\CliCommand;
use Cubex\Cli\Shell;
use Cubex\FileSystem\FileSystem;
use Cubex\Text\TextTable;

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

  public function table()
  {
    $table = new TextTable();
    $table->setColumnHeaders('Date', 'Value', 'Third', 'Random');
    for($i = 0; $i < 10; $i++)
    {
      $table->appendRow(
        date("Y-m-d H:i:s", rand(100000, time())),
        ('Random Data ' . FileSystem::readRandomCharacters(5)),
        'Third Column',
        FileSystem::readRandomCharacters(30)
      );
    }

    echo $table;
  }

  protected function _cliOut()
  {
    echo "\nThis is an example CLI Command\n";
  }
}
