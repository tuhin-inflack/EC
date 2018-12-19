@extends('hm::layouts.master')
@section('title', 'Add Hostel Budget')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Budget Creation</h4>
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
                            {!! Form::open(['route' => 'hostel-budgets.store', 'class' => 'form budgetCreateForm',' novalidate']) !!}
                            @include('hm::hostel-budget.create-form.budget_create_form')
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>

    <script>


        $(document).ready(function () {


            $('.item-select').select2({
//                    placeholder: 'Select item',
                tags: true,
                delimiter: ',',
                tokenSeparators: [',', ' ', '`'],
            });

            $('.repeater_hostel_budget').repeater({
                show: function () {
                    $(this).find('.select2-container').remove();
                    $(this).find('select').select2({
//                            placeholder: 'Select item',
                        tags: true,
                    });
                    $(this).slideDown();
                }
            });

            $('.addMoreBudgetSection').click(function () {
                 $('input,select,textarea').jqBootstrapValidation('destroy');
                $('input,select,textarea').jqBootstrapValidation();

            });

        });


    </script>
@endpush