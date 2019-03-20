@extends('hrm::layouts.master')


@section('title', 'Note')

@push('page-css')

@endpush

@section('content')

    @for($i = 0 ; $i<10; $i++)

        <section id="card-footer-options">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Note Title</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>


                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <p>Oat cake ice cream candy chocolate cake chocolate cake cotton
                                    candy dragée apple pie. Brownie carrot cake candy canes bonbon
                                    fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                                    chocolate cake liquorice. Apple pie sugar plum powder donut
                                    soufflé.
                                </p>
                                <div class="card-footer text-muted mt-2">
                                    <span>Added 3 hours ago</span>
                                    <span class="float-none">
                        <span class="badge bg-teal">Technology</span>
                        <span class="badge badge-warning">Mobile</span>
                      </span>
                                    <span class="float-right primary">View More <i class="ft-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endfor

@endsection

@push('page-js')


    <script src="{{asset('theme/vendors/js/scripts/cards/draggable.js')}}"></script>

    <script src="{{asset('theme/vendors/js/extensions/dragula.min.js')}}"></script>

@endpush