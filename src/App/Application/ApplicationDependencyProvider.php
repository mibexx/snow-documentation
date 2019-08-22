<?php
declare(strict_types=1);

namespace App\Application;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;

class ApplicationDependencyProvider extends AbstractDependencyProvider
{
    public const ELASTICSEARCH_TYPE = 'application.elasticsearch.client';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {

        return $container;
    }


}