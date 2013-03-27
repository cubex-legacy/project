<?php
/**
 * @author  brooke.bryan
 */

namespace Project;

use Cubex\Cli\CliTask;
use Cubex\Container\Container;
use Cubex\Email\Mailer;
use Cubex\Facade\Queue;
use Cubex\Foundation\Config\ConfigTrait;

use Cubex\Queue\CallableQueueConsumer;
use Cubex\Queue\StdQueue;

class Cli implements CliTask
{
  use ConfigTrait;

  public function init()
  {
    Queue::consume(
      new StdQueue("fejwh"),
      new CallableQueueConsumer(
        function ($q, $data)
        {
          if(is_object($data))
          {
            echo $data->title . "\n";
            echo "---------------------------------\n";
            echo $data->message . "\n";
            echo "=======================================================\n\n";
            flush();
            ob_flush();
          }
          else
          {
            var_dump($data);
          }
          return true;
        }, 1
      )
    );
  }
}
