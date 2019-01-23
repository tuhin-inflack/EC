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

        $attributeValueSumsByMonthYear = \Modules\PMS\Entities\AttributeValue::whereIn('attribute_id', $attributeIds)
            ->select(DB::raw('date, attribute_id, sum(planned_value) as total_planned_value, sum(achieved_value) as total_achieved_value'))
            ->groupBy('date')
            ->groupBy('attribute_id')
            ->orderBy('date')
            ->get();

        $uniqueMonthYear = $attributeValueSumsByMonthYear->map(function ($row) {
            return Carbon::parse($row->date)->format('F Y');
        })->unique()->values();

        foreach ($attributes as $index => $attribute) {
            $attributeValueDetails[$index]['id'] = $attribute->id;
            $attributeValueDetails[$index]['name'] = $attribute->name;
            $attributeValueDetails[$index]['monthly_planned_values'] = $attributeValueSumsByMonthYear->where('attribute_id', $attribute->id)
                ->pluck('total_planned_value');
            $attributeValueDetails[$index]['monthly_achieved_values'] = $attributeValueSumsByMonthYear->where('attribute_id', $attribute->id)
                ->pluck('total_achieved_value');
        }

        return view('pms::project.monitor.graph', compact('attributeValueDetails', 'uniqueMonthYear'));
    }
}
