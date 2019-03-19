@extends('hrm::layouts.master')


@section('title', 'Note')

@push('page-css')

@endpush

@section('content')

    <div class="content-body">
        <!-- Card move section start -->
        <section id="card-move-section">
            <div class="row">
                <div class="col-12 mt-1 mb-3">
                    <h4 class="text-uppercase">My Notes</h4>
                    <hr>
                </div>
            </div>
            <div class="row" id="card-move">
                @for($i=0; $i<3;$i++)
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">No:{{$i+1}}</h4>
                                <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <h4 class="card-title"> Title</h4>
                                    <p class="card-text">
                                        Jelly beans sugar plum cheesecake cookie oat cake
                                        soufflé.Tootsie
                                        roll bonbon liquorice tiramisu pie powder.Donut sweet roll
                                        marzipan pastry cookie cake tootsie roll oat cake cookie.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
        </section>
    </div>

    <!-- // Card move section end -->

@endsection

@push('page-js')


    <script src="{{asset('theme/vendors/js/scripts/cards/draggable.js')}}"></script>

    <script src="{{asset('theme/vendors/js/extensions/dragula.min.js')}}"></script>

@endpush