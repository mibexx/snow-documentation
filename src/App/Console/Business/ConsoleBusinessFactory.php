<?php
declare(strict_types=1);

namespace App\Console\Business;


use App\Console\Business\Model\Application\Application;
use App\Console\ConsoleDependencyProvider;
use Xervice\Console\Business\ConsoleBusinessFactory as XerviceConsoleBusinessFactory;
use Xervice\Console\Business\Model\Application\Application as XerviceApplication;
use Xervice\Database\Business\DatabaseFacade;
use Xervice\Kernel\Business\KernelFacade;

class ConsoleBusinessFactory extends XerviceConsoleBusinessFactory
{
    /**
     * @return \Xervice\Console\Business\Model\Application\Application
     */
    public function createApplication(): XerviceApplication
    {
        $app = new Application(
            $this->getKernelFacade()
        );
        $app->addCommandCollection($this->getCommandCollection());
        return $app;
    }

    /**
     * @return \Xervice\Kernel\Business\KernelFacade
     */
    public function getKernelFacade(): KernelFacade
    {
        return $this->getDependency(ConsoleDependencyProvider::KERNEL_FACADE);
    }
}