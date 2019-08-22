<?php
declare(strict_types=1);

namespace App\Web;


use App\Application\Plugins\Routing\Routing;
use App\Jira\Communication\Plugin\Routing\JiraRoutes;
use App\Moco\Communication\Plugin\Provider\RouteProvider;
use Xervice\Web\WebDependencyProvider as XerviceWebDependencyProvider;

class WebDependencyProvider extends XerviceWebDependencyProvider
{
    /**
     * @return \Xervice\Web\Business\Dependency\Plugin\WebProviderPluginInterface[]
     */
    protected function getRouteProvider(): array
    {
        return [
            new Routing()
        ];
    }
}
