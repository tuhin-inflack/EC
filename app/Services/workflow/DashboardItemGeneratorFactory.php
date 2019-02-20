<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/28/19
 * Time: 11:11 AM
 */

namespace App\Services\workflow;


use App\Services\workflow\Generators\BaseDashboardItemGenerator;
use App\Services\workflow\Generators\ResearchProposalItemGenerator;
use Illuminate\Support\Facades\App;

abstract class DashboardItemGeneratorFactory
{
    public static function getDashboardItemGenerator($feature) : BaseDashboardItemGenerator
    {
        switch ($feature) {
            case 'Research Proposal':
                return app()->make('App\Services\workflow\Generators\ResearchProposalItemGenerator');
            case 'Project Proposal':
                return app()->make('App\Services\workflow\Generators\ProjectProposalItemGenerator');
            case 'Research Workflow':
                return app()->make('App\Services\workflow\Generators\ResearchItemGenerator');
        }
    }
}
