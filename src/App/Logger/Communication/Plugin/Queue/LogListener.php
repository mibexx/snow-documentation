<?php
declare(strict_types=1);

namespace App\Logger\Communication\Plugin\Queue;


use DataProvider\LogMessageDataProvider;
use Xervice\LogRabbitMq\Business\Plugin\Queue\AbstractLogQueueListener;

class LogListener extends AbstractLogQueueListener
{
    public function handleLog(LogMessageDataProvider $dataProvider)
    {
        // TODO: Implement handleLog() method.
    }

}
