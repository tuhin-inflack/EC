@extends('ims::layouts.master')
@section('title', trans('ims::auction.auction_sales'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
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
                            <h4 class="form-section"><i
                                        class="la  la-building-o"></i> @lang('ims::auction.auction_sales_form')
                            </h4>
                            <hr>
                            <form onkeyup="$(this).trigger('change')"
                                  onchange="calculateFormChanges()">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">@lang('ims::auction.vendor')</label>
                                                {{ Form::select('vendor_id',
                                                    [
                                                        '1' => 'Vendor 1',
                                                        '2' => 'Vendor 2',
                                                        '3' => 'Vendor 3',
                                                    ],
                                                    null,
                                                    [
                                                        'class' => 'form-control'
                                                    ]
                                                ) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">@lang('labels.date')</label>
                                                {{ Form::text('date', date('d/m/Y'), ['class' => 'form-control']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="repeater-sales table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Inventory Item Category</th>
                                                <th>@lang('labels.quantity')</th>
                                                <th>@lang('ims::auction.unit_price')</th>
                                                <th>@lang('ims::auction.tax')</th>
                                                <th>@lang('ims::auction.vat')</th>
                                                <th>@lang('labels.total')</th>
                                                <th>@lang('labels.action')</th>
                                            </tr>
                                            </thead>
                                            <tbody data-repeater-list="sales">
                                            <tr data-repeater-item>
                                                <td>
                                                    {{ Form::select('inventory_item_category_id',
                                                        [
                                                            '1' => 'Option 1',
                                                            '2' => 'Option 2',
                                                            '3' => 'Option 3',
                                                        ],
                                                        null,
                                                        ['class' => 'form-control']
                                                    ) }}
                                                </td>
                                                <td>
                                                    {{ Form::number('quantity', null, [
                                                        'class' => 'form-control',
                                                        'min' => 1
                                                    ]) }}
                                                </td>
                                                <td>
                                                    {{ Form::number('unit_price', null, [
                                                        'class' => 'form-control',
                                                        'min' => 1
                                                    ]) }}
                                                </td>
                                                <td>
                                                    {{ Form::number('tax', null, [
                                                        'class' => 'form-control',
                                                        'min' => 1
                                                    ]) }}
                                                </td>
                                                <td>
                                                    {{ Form::number('vat', null, [
                                                        'class' => 'form-control',
                                                        'min' => 1
                                                    ]) }}
                                                </td>
                                                <td class="total">
                                                    0
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" data-repeater-delete><i
                                                                class="ft-x"></i> @lang('labels.delete')</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="3"
                                                    class="text-right">@lang('labels.grand_total')
                                                </th>
                                                <th id="sum-tax">0</th>
                                                <th id="sum-vat">0</th>
                                                <th id="sum-total">0</th>
                                                <th class="text-center">
                                                    <button type="button" class="btn btn-primary" data-repeater-create>
                                                        <i class="ft ft-plus"></i> @lang('labels.add')
                                                    </button>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button class="btn btn-success" type="button"><i
                                                        class="ft ft-check"></i> @lang('labels.save')</button>
                                            <button class="btn btn-danger" type="button"><i
                                                        class="ft ft-x"></i> @lang('labels.cancel')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{  asset('theme/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/pickers/daterange/daterangepicker.css')  }}">
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/pickers/daterange/daterange.css')  }}">
@endpush

@push('page-js')
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('theme/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>

    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script>
        function getRowTotal(element) {
            let quantity = 0;
            let unitPrice = 0;

            if (element.name.includes('quantity')) {
                quantity = element.value;
                unitPrice = $(element).closest('tr').find('input[name*=unit_price]').val();
            } else {
                quantity = $(element).closest('tr').find('input[name*=quantity]').val();
                unitPrice = element.value;
            }

            return quantity * unitPrice;
        }

        function setSumHtml(sales, property, selector) {
            let sum = sales.reduce((accumulator, sale) => {
                return accumulator + Number(sale[property]);
            }, 0);
            $(selector).html(sum);
        }

        function setSumTotalHtml(sales) {
            let sumTotal = sales.reduce((accumulator, sale) => {
                return accumulator + (Number(sale['quantity'] * Number(sale['unit_price'])));
            }, 0);
            $('#sum-total').html(sumTotal);
        }

        function setRowTotal(element) {
            if (!element.hasAttribute('name')) return;

            if ((element.name.includes('quantity') || element.name.includes('unit_price'))) {
                let rowTotal = getRowTotal(element);

                $(element).closest('tr')
                    .find('td.total')
                    .html(rowTotal);
            }
        }

        function calculateFormChanges() {
            let element = event.target;

            setRowTotal(element);

            let sales = $('.repeater-sales').repeaterVal().sales;

            setSumHtml(sales, 'tax', '#sum-tax');
            setSumHtml(sales, 'vat', '#sum-vat');
            setSumTotalHtml(sales);
        }

        $(document).ready(function () {
            $('input[name=date]').pickadate({
                max: new Date(),
                format: 'dd/mm/yyyy'
            });

            $('.repeater-sales').repeater({
                isFirstItemUndeletable: true,
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                        let $sumTax = $('#sum-tax');
                        let $sumVat = $('#sum-vat');
                        let $sumTotal = $('#sum-total');

                        let removedSale = $(this).repeaterVal().sales[0];

                        let oldSumTax = Number($sumTax.html());
                        let oldSumVat = Number($sumVat.html());
                        let oldSumTotal = Number($sumTotal.html());

                        $sumTax.html(oldSumTax - removedSale.tax);
                        $sumVat.html(oldSumVat - removedSale.vat);
                        $sumTotal.html(oldSumTotal - (removedSale.quantity * removedSale.unit_price));
                    }
                }
            });
        });
    </script>
@endpush