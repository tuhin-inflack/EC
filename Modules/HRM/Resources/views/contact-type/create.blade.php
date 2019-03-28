@extends('hrm::layouts.master')
@section('title', 'Note')
@push('page-css')
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Contact Type</h4>
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
                            @if($errors->has('room_types'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $errors->first('room_types') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h4 class="form-section"><i
                                        class="la  la-building-o"></i>Create Contact Type</h4>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="la la-check-square-o"></i>Create
                                </button>

                            </div>
                            {!! Form::close() !!}


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">Contact Type Information</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
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

                                        <table class="table table-striped table-bordered zero-configuration text-center">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Client</td>
                                                <td>
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2"
                                                          class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{url('hrm/appraisal/12')}}"
                                                           class="dropdown-item"><i class="ft-eye"></i> @lang('labels.details')</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a href="#" class="dropdown-item"><i class="ft ft-trash"></i> @lang('labels.delete')</a>
                                                </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-js')


@endpush