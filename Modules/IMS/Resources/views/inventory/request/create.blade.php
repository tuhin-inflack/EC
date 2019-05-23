@extends('ims::layouts.master')

@section('title', trans('labels.new') .' '. trans('ims::inventory.inventory_request'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">@lang('labels.new') @lang('ims::inventory.inventory_request')</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements" style="top: 5px;">
                <ul class="list-inline mb-1">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
            <div class="heading-elements mt-2" style="margin-right: 10px;">
                <a href="{{ route('inventory-request.index') }}" class="btn btn-primary btn-sm">
                    <i class="ft-list white"> @lang('ims::inventory.inventory_request') @lang('labels.list')</i>
                </a>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                @include('ims::inventory.request.form', ['page' => 'create'])
            </div>
        </div>
    </div>
@stop

@push('page-js')
    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation("destroy");
            $('.select').select2();

            $('.repeater-category-request, .repeater-new-category-request, .repeater-bought-category-request').repeater({
                // isFirstItemUndeletable: true,
                show: function () {
                    $(this).slideDown();
                    // TODO: Find all Select Tag and add select2 into them
                    // $(this).find('select').select2();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        });

    </script>
@endpush