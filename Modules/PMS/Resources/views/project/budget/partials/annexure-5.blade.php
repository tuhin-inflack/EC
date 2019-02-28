<div class="col-md-12">
    <section id="number-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('draft-proposal-budget.annexure-5')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>@lang('draft-proposal-budget.economy_code')</th>
                                    <th>@lang('draft-proposal-budget.economy_code') @lang('labels.details')</th>
                                    <th>@lang('labels.unit')</th>
                                    <th>@lang('labels.unit_rate')</th>
                                    <th>@lang('labels.quantity')</th>
                                    <th>নিজস্ব অর্থায়ন
                                        (বৈদেশিক মুদ্রা)</th>
                                    <th>জিওবি (বৈদেশিক মুদ্রা)</th>
                                    <th>নিজস্ব অর্থায়ন
                                        (বৈদেশিক মুদ্রা)</th>
                                    <th>@lang('labels.total')</th>
                                    <th>@lang('labels.total') @lang('labels.expense')</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @for($l = 1; $l <= 10; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                <tr>
                                    <th colspan="7">(ক) @lang('draft-proposal-budget.revenue') : </th>
                                    @for($l = 1; $l <= 9; $l++)
                                        <td></td>
                                    @endfor
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>