@extends('pms::layouts.master')
@section('title', trans('pms::project_budget.title'))

@push('page-css')

@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('labels.edit') @lang('pms::project_budget.budgeting')</h4>
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
                                        @include('pms::project.budget.form', ['page' => 'edit'])
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

        $(document).ready(function () {

            $('.economy-code-select, .section-type-select').select2({
                placeholder: selectPlaceholder
            });

            $('input[name=unit_rate], input[name=quantity]').keyup((e) => {
                calcutateTotalExpense();
            });

            // $('.add-fiscal-value-row').css('cursor', 'pointer').click(() => {
            //     var tbody = $('#fiscal-values');
            //
            //     var row = `<tr>
            //                 <td><input type="number" name="fiscal_year[]" class="form-control"></td>
            //                 <td><input type="number" name="monetary_amount[]" class="form-control"></td>
            //                 <td><input type="number" name="body_percentage[]" class="form-control"></td>
            //                 <td><input type="number" name="project_percentage[]" class="form-control"></td>
            //                 <td><i class="la la-trash-o text-danger remove-item"></i></td>
            //             </tr>`;
            //
            //     tbody.append(row);
            //
            //     $('.remove-item').off();
            //     $('.remove-item').css('cursor', 'pointer').click(function(){
            //         $(this).parents('tr').remove();
            //     });
            //
            // });

            // validation
            $('.project-budget-form').validate({
                ignore: 'input[type=hidden]', // ignore hidden fields
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
                    } else if (element[0].tagName == "SELECT") {
                        error.insertAfter(element.siblings('.select2-container'));
                    } else if (element.attr('id') == 'ckeditor') {
                        error.insertAfter(element.siblings('#cke_ckeditor'));
                    } else {
                        error.insertAfter(element);
                    }
                },
            });

        });

        function calcutateTotalExpense() {
            var unitRate = $('input[name=unit_rate]').val();
            var quantity = $('input[name=quantity]').val();

            var totalExpense = Number(unitRate) * Number(quantity);

            $('input[name=total_expense]').val(totalExpense);
        }


    </script>
@endpush
