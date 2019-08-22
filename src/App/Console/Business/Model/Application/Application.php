<?php
declare(strict_types=1);

namespace App\Console\Business\Model\Application;


use DataProvider\RedisSessionDataProvider;
use DataProvider\ActivityEntityDataProvider;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Business\Model\Application\Application as XerviceApplication;
use Xervice\Kernel\Business\KernelFacade;

class Application extends XerviceApplication
{
    /**
     * @var \Xervice\Kernel\Business\KernelFacade
     */
    private $kernelFacade;

    /**
     * Application constructor.
     *
     * @param \Xervice\Database\Business\DatabaseFacade $databaseFacade
     * @param string $name
     * @param string $version
     */
    public function __construct(
        KernelFacade $kernelFacade,
        string $name = 'UNKNOWN',
        string $version = 'UNKNOWN'
    ) {
        $this->kernelFacade = $kernelFacade;

        parent::__construct($name, $version);
    }


    /**
     * @param \Symfony\Component\Console\Input\InputInterface|null $input
     * @param \Symfony\Component\Console\Output\OutputInterface|null $output
     *
     * @return int
     * @throws \Exception
     */
    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        define('IS_CONSOLE', true);

        if (
            class_exists(RedisSessionDataProvider::class)
            && class_exists(ActivityEntityDataProvider::class)
        ) {
            $this->kernelFacade->boot();
        }

        return parent::run($input, $output);
    }
}