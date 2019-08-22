<?php
declare(strict_types=1);

namespace App\Event;


use App\Moco\Business\Model\Handler\Projects\ProjectHandler;
use App\Moco\Communication\Plugin\Event\ProjectUpdateListener;
use Xervice\Event\EventDependencyProvider as XerviceEventDependencyProvider;

class EventDependencyProvider extends XerviceEventDependencyProvider
{
    /**
     * Event Listener
     * eventName => array(listener1::class, listener2::class)
     *
     * @return array
     */
    protected function getListener(): array
    {
        return [
            ProjectHandler::EVENT_NAME => [
                ProjectUpdateListener::class
            ]
        ];
    }

}