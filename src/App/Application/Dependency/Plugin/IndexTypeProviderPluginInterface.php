<?php
declare(strict_types=1);

namespace App\Application\Dependency\Plugin;


use DataProvider\TypeDataProvider;

interface IndexTypeProviderPluginInterface
{
    /**
     * @return \DataProvider\TypeDataProvider
     */
    public function getType(): TypeDataProvider;
}