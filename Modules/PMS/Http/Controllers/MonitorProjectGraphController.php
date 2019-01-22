<?php

namespace Modules\PMS\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Entities\ProjectProposal;

class MonitorProjectGraphController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ProjectProposal $projectProposal
     * @return Response
     */
    public function index(ProjectProposal $projectProposal)
    {

        $attributes = $projectProposal->organizations->map(function ($organization) {
            return $organization->attributes->map(function ($attribute) {
                return $attribute;
            });
        })->flatten();

        $attributeIds = $attributes->map(function ($attrbute) {
            return $attrbute->id;
        });

        $attributeValueSumsByMonth = \Modules\PMS\Entities\AttributeValue::whereIn('attribute_id', $attributeIds)
            ->select(DB::raw('date_format(date, "%M %Y") as date, attribute_id, sum(planned_value) as total_planned_value, sum(achieved_value) as total_achieved_value'))
            ->groupBy('date')
            ->groupBy('attribute_id')
            ->get();

        return view('pms::project.monitor.graph', compact('attributes', 'attributeValueSumsByMonth'));
    }
}
