<div class="card">
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-form">@lang('labels.gantt_chart')</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <input value="Export to PNG" class="btn btn-outline-primary btn-sm" type="button" onclick='exportGantt("png")'>
                    <input value="Export to PDF" class="btn btn-outline-warning btn-sm" type="button" onclick='exportGantt("pdf")'>
                </div>
                <div class="col-12">
                    <div id="GanttChartDIV" style='height:300px;'></div>
                </div>
            </div>
        </div>
    </div>
</div>