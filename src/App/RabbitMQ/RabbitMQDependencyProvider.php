<?php
declare(strict_types=1);

namespace App\RabbitMQ;


use App\EventRabbitMq\Communication\Plugin\QueueListener;
use App\Moco\Communication\Plugin\Listener\SyncListener;
use App\Moco\Communication\Plugin\MocoExchange;
use App\Moco\Communication\Plugin\MocoQueue;
use Xervice\EventRabbitMq\Business\Plugin\Queue\EventExchange;
use Xervice\EventRabbitMq\Business\Plugin\Queue\EventQueue;
use Xervice\LogRabbitMq\Business\Plugin\Queue\LogExchange;
use Xervice\LogRabbitMq\Business\Plugin\Queue\LogQueue;
use Xervice\RabbitMQ\RabbitMQDependencyProvider as XerviceRabbitMQDependencyProvider;

class RabbitMQDependencyProvider extends XerviceRabbitMQDependencyProvider
{
    /**
     * @return \Xervice\RabbitMQ\Business\Dependency\Queue\QueueInterface[]
     */
    protected function getQueues(): array
    {
        return [
            new EventQueue(),
            new LogQueue()
        ];
    }

    /**
     * @return \Xervice\RabbitMQ\Business\Dependency\Exchange\ExchangeInterface[]
     */
    protected function getExchanges(): array
    {
        return [
            new EventExchange(),
            new LogExchange()
        ];
    }

    /**
     * @return \Xervice\RabbitMQ\Business\Dependency\Worker\Listener\ListenerInterface[]
     */
    protected function getListener(): array
    {
        return [
            new QueueListener(),
            new SyncListener()
        ];
    }
}
