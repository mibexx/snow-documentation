<?php
declare(strict_types=1);

namespace App\Console;

use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;
use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Database\Communication\Console\Command\ConfigGenerateCommand;
use Xervice\Database\Communication\Console\Command\MigrateCommand;
use Xervice\Database\Communication\Console\Command\ModelBuildCommand;
use Xervice\DatabaseDataProvider\Communication\Console\EnityGenerateCommand;
use Xervice\DataProvider\Communication\Console\CleanCommand;
use Xervice\DataProvider\Communication\Console\GenerateCommand;
use Xervice\Development\Communication\Console\Command\GenerateAutoCompleteCommand;
use Xervice\Processor\Communication\Console\RunProcessCommand;
use Xervice\RabbitMQ\Communication\Console\Command\ConsumeCommand;
use Xervice\RabbitMQ\Communication\Console\Command\WorkerCommand;

class ConsoleDependencyProvider extends XerviceConsoleDependencyProvider
{
    public const KERNEL_FACADE = 'console.kernel.facade';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->setKernelFacade($container);

        return parent::handleDependencies($container);
    }

    /**
     * @return array
     */
    protected function getCommandList(): array
    {
        return array_merge(
            [
                new GenerateCommand(),
                new EnityGenerateCommand(),
                new CleanCommand(),
                new WorkerCommand(),
                new ConsumeCommand(),
                new ModelBuildCommand(),
                new MigrateCommand(),
                new ConfigGenerateCommand(),
                new RunProcessCommand(),
            ],
            $this->getDevCommands()
        );
    }

    protected function getDevCommands()
    {
        $commands = [];

        if (class_exists(GenerateAutoCompleteCommand::class)) {
            $commands[] = new GenerateAutoCompleteCommand();
        }

        return $commands;
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function setKernelFacade(DependencyContainerInterface $container
    ): \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface {
        $container[self::KERNEL_FACADE] = function (DependencyContainerInterface $container) {
            return $container->getLocator()->kernel()->facade();
        };
        return $container;
}
}
