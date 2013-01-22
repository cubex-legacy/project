<?php
/**
 * @author  brooke.bryan
 */

namespace Project\Bundles\Debugger;

use Cubex\Bundle\Bundle;
use Cubex\Events\Event;
use Cubex\Events\EventManager;

class DebuggerBundle extends Bundle
{
  public function init($initialiser = null)
  {
    EventManager::listen(
      EventManager::CUBEX_QUERY, function (Event $e)
      {
        var_dump($e->getStr("query"));
      }
    );
  }
}
