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
                {!! Form::open(['route' =>  ['inventory-request.store'], 'class' => 'form inventory-request-form']) !!}
                    @include('ims::inventory.request.form', ['page' => 'create'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@push('page-js')
    <script type="text/javascript" src="{{ asset('theme/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation("destroy");
            $('.select').select2();

            $('.repeater-category-request, .repeater-new-category-request, .repeater-bought-category-request').repeater({
                // isFirstItemUndeletable: true,
                initEmpty: true,
                show: function () {
                    prepareRepeater(this);
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        });


        let validator = $('.inventory-request-form').validate({
            ignore: [],
            errorClass: 'danger',
            successClass: 'success',
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            errorPlacement: function (error, element) {
                if (element.attr('type') == 'radio') {
                    error.insertBefore(element.parents().siblings('.radio-error'));
                } else if (element[0].tagName == "SELECT") {
                    error.insertAfter(element.siblings('.select2-container'));
                } else if (element.attr('id') == 'ckeditor') {
                    error.insertAfter(element.siblings('#cke_ckeditor'));
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                // name: {
                //     remote: ""
                // }
            },
            submitHandler: function (form, event) {
                form.submit();
            }
        });

        function prepareRepeater(instance) {
            $(instance).slideDown();
            $(instance).find('.repeater-select').select2();
            let fromLocationId = $('select[name=from_location_id]').val();

        }

    </script>
@endpush