@extends('hrm::layouts.master')
@section('title', trans('hrm::leave.leave_application'))
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
@endpush
@section("content")
    <section id="leave">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{--<h4 class="card-title" id="repeat-form">@lang('hrm::leave.leave_application')</h4>--}}
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
                            <h3 class="form-section"><i class="ft-grid"></i> Job Circular Form </h3>
                            {!! Form::open(['url' =>  route('employee-leave.store'), 'class' => 'form', 'novalidate', 'method' => 'post']) !!}
                            @include('hrm::job-circular.form.circular_creating_form')
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js')  }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript">
        $('#leave_start_date').change(function () {
            $('#leave_end_date').pickadate('picker').set('min', new Date($(this).val()));
        });

        $('#leave_start_date, #leave_end_date').pickadate({
            format: 'dd mmmm, yyyy',
        });

        function dateDifference() {
            var val1 = document.getElementById('leave_start_date').value;
            var val2 = document.getElementById('leave_end_date').value;
            var date1 = new Date(val1);
            var date2 = new Date(val2);
            var timeDiff = Math.abs(date2.getTime() - date1.getTime());
            var diffDays = (Math.ceil(timeDiff / (1000 * 3600 * 24))) + 1;

            console.log('triggered');

            if (diffDays)
                document.getElementById('duration').value = diffDays + " days";
            else
                document.getElementById('duration').value = "...";
        }
    </script>
@endpush