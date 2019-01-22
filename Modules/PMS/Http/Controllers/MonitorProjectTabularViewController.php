<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\ProjectProposal;

class MonitorProjectTabularViewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ProjectProposal $projectProposal
     * @return Response
     */
    public function index(ProjectProposal $projectProposal)
    {
        $attributeIds = $projectProposal->organizations->map(function ($organization) {
            return $organization->attributes->map(function ($attribute) {
                return $attribute->id;
            });
        })->flatten();

        $attributeValues = \Modules\PMS\Entities\AttributeValue::whereIn('attribute_id', $attributeIds)->get();

        $attributeValueSumsByMonth = $attributeValues->groupBy(function ($attributeValue) {
            return \Carbon\Carbon::parse($attributeValue->date)->format('F Y');
        })->map(function ($groupedRows) {
            return $groupedRows->groupBy(function ($row) {
                return $row->attribute_id;
            })->map(function ($rows) {
                // check for max
                return [
                    'total_planned_values' => $rows->sum('planned_value'),
                    'total_achieved_values' => $rows->sum('achieved_value')
                ];
            });
        });

        return view('pms::project.monitor.tabular-view', compact('projectProposal', 'attributeValueSumsByMonth'));
    }
}
