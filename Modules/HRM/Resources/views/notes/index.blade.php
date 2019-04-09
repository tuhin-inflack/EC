@extends('hrm::layouts.master')


@section('title', 'Note')

@push('page-css')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/css/extensions/sweetalert.css')}}">
    <!-- END VENDOR CSS -->
@endpush

@section('content')

    @for($i = 0 ; $i<10; $i++)

        <section id="card-footer-options">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Note Title
                                <span class="badge bg-teal">Type</span>

                                <label class="fonticon-unit float-right">
                                    <div class="fonticon-wrap">

                                        <a href="{{url('hrm/notes/edit/1')}}"><i class="ft-edit"></i></a>

                                        <a href="#" class="custom_delete ft-trash-2" data-id="{{1}}">
                                        </a>

                                    </div>

                                </label>


                            </h4>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <p>{{ str_limit($dummy_string, $limit = 500, $end = '...') }}
                                    </p>
                                    <div class="card-footer text-muted mt-2">
                                        <span>Added 3 hours ago</span>

                                        <a href="{{url('hrm/notes/1')}}"><span class="float-right primary">View Full Note <i
                                                        class="ft-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Note Title
                                <span class="badge bg-teal">Type</span>

                                <label class="fonticon-unit float-right">
                                    <div class="fonticon-wrap">

                                        <a href="{{url('hrm/notes/edit/1')}}"><i class="ft-edit"></i></a>

                                        <a href="#" class="custom_delete ft-trash-2" data-id="{{1}}">
                                        </a>

                                    </div>

                                </label>


                            </h4>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <p>{{ str_limit($dummy_string, $limit = 500, $end = '...') }}
                                    </p>
                                    <div class="card-footer text-muted mt-2">
                                        <span>Added 3 hours ago</span>

                                        <a href="{{url('hrm/notes/1')}}"><span class="float-right primary">View Full Note <i
                                                        class="ft-arrow-right"></i></span></a>
                                    </div>
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

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('theme/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('theme/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script type="text/javascript">

        // $('.custom_delete').on('click', function () {
        //     var id = $(this).data('id');
        //     alert(id);
        //
        // });
        //

        $(document).on('click', '.custom_delete', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            swal({
                title: "Are you sure!",
                type: "error",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "{{url('/hrm/notes/1')}}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: "DELETE"
                            },
                            success: function (data) {
                                console.log(data);
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            }

                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
    </script>


@endpush