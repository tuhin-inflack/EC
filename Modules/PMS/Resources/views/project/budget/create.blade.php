@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('labels.create') @lang('pms::project_budget.budgeting')</h4>
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
                                        @include('pms::project.budget.form', ['page' => 'create'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script>
        // select2 placeholder localization
        let selectPlaceholder = '{!! trans('labels.select') !!}';

        let checksumMessage = "{{ trans('labels.summation of above fields must be equal to total amount') }}";

        $(document).ready(function () {

            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation("destroy");

            toggleComponents(($('.section-type-select').val() === "price_contingency" || ($('.section-type-select').val() === "physical_contingency")));

            $('.economy-code-select, .section-type-select').select2({
                placeholder: selectPlaceholder
            });

            $('input[name=unit_rate], input[name=quantity]').keyup(() => {
                calculateTotalExpense();
            });

            $('.section-type-select').change(function (e) {
                toggleComponents((e.target.value === "price_contingency" || e.target.value === "physical_contingency"));
            });

        });

        jQuery.validator.addMethod(
            "checksum",
            function (value, element, params) {
                let sum = 0;
                params.forEach(function (el) {
                    sum += parseFloat($(el).val());
                });
                return parseFloat(value) === sum;
            },
            checksumMessage
        );

        // jQuery.validator.addMethod(
        //     "checkfiscalsum",
        //     function (value, element, params) {
        //         let tbody = $(params);
        //         let sum = 0
        //         tbody.find('tr').each(function (el) {
        //             el
        //         });
        //
        //         return parseFloat(value) === sum;
        //     },
        //     checksumMessage
        // );

        let validator = $('.project-budget-form').validate({
            ignore: [],//'input[type=hidden]', // ignore hidden fields
            errorClass: 'danger',
            successClass: 'success',
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            errorPlacement: function (error, element) {
                if (element.attr('type') == 'radio') {
                    error.insertBefore(element.parents().siblings('.radio-error'));
                }
                else if (element[0].tagName == "SELECT") {
                    error.insertAfter(element.siblings('.select2-container'));
                }
                else if (element.attr('id') == 'ckeditor') {
                    error.insertAfter(element.siblings('#cke_ckeditor'));
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                check_distributed_collection: {
                    checksum: ['input[name=gov_source]', 'input[name=own_financing_source]', 'input[name=other_source]']
                },
                // check_distributed_fiscalyear: {
                //     checkfiscalsum: '#fiscal-values'
                // }
            },
            submitHandler: function(form, event) {
                $(form).find('input[name=check_distributed_collection]').remove();
                $(form).find('input[name=check_distributed_fiscalyear]').remove();
                form.submit();
            }
        });

        function toggleComponents(bool) {

            let components = $(`select[name=economy_code_id], input[name=unit], input[name=unit_rate], input[name=quantity]`);
            components.prop( "disabled", bool);

            if (bool)
                components.removeAttr('required');
            else
                components.attr('required','required');

            $('input[name=total_expense]').prop( "readonly", !bool);
            $('input[name=total_expense_percentage]').prop( "disabled", !bool);

            validator.resetForm();
        }

        function calculateTotalExpense() {
            var unitRate = $('input[name=unit_rate]').val();
            var quantity = $('input[name=quantity]').val();

            var totalExpense = Number(unitRate) * Number(quantity);

            $('input[name=total_expense], input[name=check_distributed_collection], input[name=check_distributed_fiscalyear]')
                .val(totalExpense);
        }

    </script>
@endpush

@push('page-css')
    <style type="text/css">

        .table thead {
            text-align: center;
        }
        .table thead th{
            vertical-align: inherit;
        }
        .table th, .table td {
            padding: 0.15rem 0.15rem;
        }

        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        input.form-control {
            height: 30px;
        }

        .form-control {
            padding: .1rem 0.25rem;
        }
    </style>
@endpush
