@extends('pms::layouts.master')
@section('title', trans('pms::project.project_monitoring_tabular_view'))

@section('content')
    <!-- Line Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Simple Line Chart</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body chartjs">
                        <canvas id="line-chart" height="500"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/charts/chartjs/line/line.js') }}"></script>
    <script>
        $(document).ready(function () {
            let attributes = JSON.parse('{!! $attributes !!}');

            let attriubteValueSumsByMonth = JSON.parse('{!! json_encode($attributeValueSumsByMonth) !!}');

            let months = attriubteValueSumsByMonth.map((attributeValue) => {
                return attributeValue.date;
            }).filter((value, index, self) => {
                return self.indexOf(value) === index;
            });

            /*Array.prototype.groupBy = function(prop) {
                return this.reduce(function(groups, item) {
                    const val = item[prop]
                    groups[val] = groups[val] || []
                    groups[val].push(item)
                    return groups
                }, {})
            };

            let groupedByAttributeId = attriubteValueSumsByMonth.groupBy('attribute_id');
            console.log(groupedByAttributeId);*/
        });
    </script>
@endpush

