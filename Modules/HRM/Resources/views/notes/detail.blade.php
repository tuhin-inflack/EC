@extends('hrm::layouts.master')


@section('title', 'Note Details')

@push('page-css')

@endpush

@section('content')



    <section id="card-footer-options">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Note Title
                            <span class="badge bg-teal">Type</span>

                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>


                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <p>{{$dummy_string}}
                            </p>
                            <div class="card-footer text-muted mt-2">
                                <span>Added 3 hours ago</span>
                                <span class="float-none">

                      </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection

@push('page-js')


    <script src="{{asset('theme/vendors/js/scripts/cards/draggable.js')}}"></script>

    <script src="{{asset('theme/vendors/js/extensions/dragula.min.js')}}"></script>

@endpush