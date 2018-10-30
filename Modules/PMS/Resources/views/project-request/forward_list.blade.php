@extends('pms::layouts.master')
@section('title', 'Project Proposal Request Forward List ')

@section('content')
    <div class="content-body">
        <!-- Basic initialization table -->
        <section id="initialization">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Proposal Forward List</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <table class="table table-striped table-bordered datacol-basic-initialisation">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Project title</th>
                                        <th>Forward to</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($lists as $list)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $list['project_request']['title'] }}</td>
                                            <td>{{ $list['user']['email']}}</td>
                                            <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i class="ft-eye"></i> Details</a>

                                                <a href="" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                <div class="dropdown-divider"></div>


                                              </span>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Basic initialization table -->

    </div>
@endsection
@push('page-js')
    <script src="{{ asset('theme/js/scripts/tables/datatables-extensions/datatables-colreorder.js') }}"
            type="text/javascript"></script>
    <script>
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush
