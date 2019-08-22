<?php
declare(strict_types=1);

namespace App\Processor;


use App\Jira\Business\Model\Translator\Functions\AcceptenceTranslator;
use App\Jira\Business\Model\Translator\Functions\EstimationTranslator;
use App\Jira\Business\Model\Translator\Functions\ProjectTranslator;
use App\Jira\Business\Model\Translator\Functions\SprintTranslator;
use App\Jira\Business\Model\Translator\Functions\StatusTranslator;
use App\Jira\Business\Model\Translator\Functions\StoryTranslator;
use App\Jira\Business\Model\Translator\Functions\TechnicalAcceptenceTranslator;
use App\Jira\Business\Model\Translator\Functions\UserStoryTranslator;
use App\Jira\Communication\Plugin\JiraProcessConfiguration;
use Xervice\Processor\ProcessorDependencyProvider as XerviceProcessorDependencyProvider;

class ProcessorDependencyProvider extends XerviceProcessorDependencyProvider
{
    /**
     * @return \Xervice\Processor\Business\Dependency\ProcessConfigurationPluginInterface[]
     */
    protected function getProcessConfigurationPlugins(): array
    {
        return [];
    }

    /**
     * @return \Xervice\Processor\Business\Model\Translator\TranslatorInterface[]
     */
    protected function getTranslatorFunctions(): array
    {
        return [];
    }

}
