<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/23/19
 * Time: 2:36 PM
 */

namespace App\Services\workflow;


use App\Models\DashboardItemSummary;

class DashboardWorkflowService
{
    public function getDashboardWorkflowItems($feature) : DashboardItemSummary
    {
        $itemGenerator = DashboardItemGeneratorFactory::getDashboardItemGenerator($feature);
        return $itemGenerator->generateItems();
    }
}
