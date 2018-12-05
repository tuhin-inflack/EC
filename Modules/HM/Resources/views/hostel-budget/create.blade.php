@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Budget Creation</h4>
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
                            <form action="{{ route('hostel-budgets.store') }}" method="post">
                                <h4 class="form-section"><i class="la  la-building-o"></i>Hostel Budget Form</h4>
                                @csrf
                                <div class="repeater-default">
                                    <div data-repeater-list="hostel_budgets">
                                        <div data-repeater-item="" style="">
                                            <div class="form row">
                                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                                    <label>Section <span class="danger">*</span></label>
                                                    <br>
                                                    <input type="text" name="section" class="form-control"
                                                           placeholder="e.g Furniture" required>
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                                    <label>Amount <span class="danger">*</span></label>
                                                    <br>
                                                    <input type="number" name="amount" min="1" id=""
                                                           class="form-control" placeholder="e.g 10" required>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                    <button type="button" class="btn btn-outline-danger"
                                                            data-repeater-delete=""><i
                                                                class="ft-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group overflow-auto">
                                        <div class="col-12">
                                            <button type="button" data-repeater-create=""
                                                    class="pull-right btn btn-sm btn-outline-primary">
                                                <i class="ft-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-actions text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                        <a class="btn btn-warning mr-1" role="button" href="#">
                                            <i class="ft-x"></i> Cancel
                                        </a>
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

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
@endpush