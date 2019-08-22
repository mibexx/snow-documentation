<?php
declare(strict_types=1);

namespace App\EventRabbitMq\Communication\Plugin;


use Xervice\EventRabbitMq\Business\Plugin\Listener\QueueListener as XerviceQueueListener;

class QueueListener extends XerviceQueueListener
{
    /**
     * @return int
     */
    public function getChunkSize(): int
    {
        return 100;
    }
}