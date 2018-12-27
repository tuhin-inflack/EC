@extends('hm::layouts.master')
@section('title', 'Approved Booking Request')
@push('page-css')
    <style type="text/css" src="css/jquery.seat-charts.css"></style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Room Allocation</h4>
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
                            <div id="seat-map" class="seatCharts-container" tabindex="0" aria-activedescendant="1_1">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script type="text/javascript" src="{{asset('/js/jquery.seat-charts.min.js')}}"></script>
    <script type="text/javascript">

        var firstSeatLabel = 1;

        $(document).ready(function () {
            sc = $('#seat-map').seatCharts({
                map: [
                    'ffff',
                    'ffff',
                    'eeee',
                    'eeee',
                    'eede',
                ],
                seats: {
                    f: {
                        price: 100,
                        classes: 'first-class', //your custom CSS class
                        category: 'First Class'
                    },
                    e: {
                        price: 40,
                        classes: 'economy-class', //your custom CSS class
                        category: 'Economy Class'
                    }

                },
                naming: {
                    top: false,
                    getLabel: function (character, row, column) {
                        return firstSeatLabel++;
                    },
                },
                legend: {
                    node: $('#legend'),
                    items: [
                        ['f', 'available', 'First Class'],
                        ['e', 'available', 'Economy Class'],
                        ['f', 'unavailable', 'Already Booked']
                    ]
                },
                click: function () {
                    if (this.status() == 'available') {
                        return 'selected';
                    } else if (this.status() == 'selected') {
                        //seat has been vacated
                        return 'available';
                    } else if (this.status() == 'unavailable') {
                        //seat has been already booked
                        return 'unavailable';
                    } else {
                        return this.style();
                    }
                }
            });

            //this will handle "[cancel]" link clicks
            $('#selected-seats').on('click', '.cancel-cart-item', function () {
                //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
                sc.get($(this).parents('li:first').data('seatId')).click();
            });

            //let's pretend some seats have already been booked
            sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');

        });

        function recalculateTotal(sc) {
            var total = 0;

            //basically find every selected seat and sum its price
            sc.find('selected').each(function () {
                total += this.data().price;
            });

            return total;
        }
    </script>

@endpush
