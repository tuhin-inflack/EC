@extends('hm::layouts.master')
@section('title', trans('hm::hostel_budget.page_title'))
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($budgetWithTitles->status == 1)

                    <div class="card">
                        <div class="card-header bg-gradient-success ">
                            <h4 class="card-title ">Budget List for {{ $budgetWithTitles->name }}</h4>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered alt-pagination"
                                           id="budgetDetailsTable">
                                        <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Section Name</th>
                                            <th scope="col">Budget Amount</th>
                                            <th scope="col">Approved Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($budgetWithTitles->hostelBudgets)>0)
                                            @foreach($budgetWithTitles->hostelBudgets as $budget)
                                                {{--{{ dd($budget) }}--}}

                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $budget->budgetSection->name }}</td>
                                                    <td>{{ $budget->budget_amount }}</td>
                                                    <td>{{ $budget->budget_approved_amount }}</td>
                                                </tr>

                                            @endforeach
                                            {{--<tr>--}}
                                                {{--<td colspan="3">Total</td>--}}
                                                {{--<th>{{ $total }}</th>--}}
                                            {{--</tr>--}}
                                        @endif

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="3" style="text-align:right">Total:</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(isset($budgetWithTitles->hostelBudgets) && count($budgetWithTitles->hostelBudgets)>0)

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">{{ trans('hm::hostel_budget.approve_cancel_card_title') }}</h4>
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
                                {!! Form::open(['route' => ['hostel-budgets.approve', $budgetWithTitles->id], 'class' => 'form budgetCreateForm',' novalidate']) !!}
                                @include('hm::hostel-budget.form.budget_approve_form')
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Data not found or something going wrong </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('page-css')
    <style>
        th { white-space: nowrap; }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/forms/icheck/icheck.css') }}">
@endpush


@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/tables/datatables/datatable-advanced.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('js/hostel-budget/sum.js') }}"></script>
    <script>
        $(document).ready(function () {
            calculateBudgetSum('budget_approved_amount');

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


            $('#budgetDetailsTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'copyButton',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        }
                    },
                    {
                        extend: 'excel',
                        'title': 'Hostel Budget Report ( {{ $budgetWithTitles->name }} )' ,
                        className: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        footer: true
                    },
                    // {
                    //     extend: 'pdf',
                    //     className: 'pdf',
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3],
                    //
                    //     },
                    //     footer: true
                    // },
                    {
                        extend: 'print',
                        className: 'print',
                        text: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3],

                        },
                        footer: true
                    },
                ],
                paging: false,
                searching: true,
                "bDestroy": true,
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 3, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 3 ).footer() ).html(
//                        '$'+pageTotal +' ( $'+ total +' total)'
                        +pageTotal + ' /='
                    );
                },
                dom: 'Bfrtip',

            });

        });


    </script>
@endpush