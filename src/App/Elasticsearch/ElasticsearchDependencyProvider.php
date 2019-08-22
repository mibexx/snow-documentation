<?php
declare(strict_types=1);

namespace App\Elasticsearch;


use App\Jira\Communication\Plugin\Search\IndexPlugin as JiraIndexPlugin;
use App\Moco\Communication\Plugin\Search\IndexPlugin as MocoIndexPlugin;
use Xervice\Elasticsearch\ElasticsearchDependencyProvider as XerviceElasticsearchDependencyProvider;

class ElasticsearchDependencyProvider extends XerviceElasticsearchDependencyProvider
{
    /**
     * @return array
     */
    protected function getIndexProvider(): array
    {
        return [];
    }
}
