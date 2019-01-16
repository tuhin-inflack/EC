<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> Organization add form </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{--{{ dd($organizations->pluck('name', 'id')) }}--}}
                <div class="form-group {{ $errors->has('organization_id') ? ' error' : '' }}">
                    {{ Form::label('organization_id', 'Add organization for ( ' .  $proposal->title ." )") }}
                    {{ Form::select('organization_id',  $organizations, null,
                    ['class' => 'form-control addSelect2Class organizationSelect', 'placeholder' =>trans('labels.select'), 'data-validation-required-message'=>trans('labels.This field is required')]) }}

                    <div class="help-block"></div>
                    @if ($errors->has('organization_id'))
                        <div class="help-block">  {{ $errors->first('organization_id') }}</div>
                    @endif
                </div>
                {{ Form::hidden('type', $type) }}
                {{ Form::hidden('organization_for_id', $proposal->id) }}
            </div>
        </div>
    </div>
    <div class="row addNewOrganization " >
        <div class="col-md-6 ">
            <div class="form-group ">
                <div class="form-group ">
                    {{ Form::label('name', 'Organization Name') }}
                    <br/>
                    {{ Form::text('name',  null,  ['id'=>'', 'class' => 'addOrganizationInput form-control', 'placeholder' => 'Enter organization name', 'data-validation-required-message' => trans('labels.This field is required')]) }}

                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group ">
                <div class="form-group ">
                    {{ Form::label('email', 'Organization Email') }}
                    <br/>
                    {{ Form::text('email',  null,    ['id'=>'', 'class' => ' form-control', 'placeholder' => 'Enter organization email']) }}
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group ">
                <div class="form-group ">
                    {{ Form::label('mobile', 'Organization Mobile') }}
                    <br/>
                    {{ Form::text('mobile',  null,    ['id'=>'', 'class' => ' form-control', 'placeholder' => 'Enter organization mobile']) }}
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group ">
                <div class="form-group ">
                    {{ Form::label('address', 'Organization Mobile') }}
                    <br/>
                    {{ Form::text('address',  null,    ['id'=>'', 'class' => ' form-control', 'placeholder' => 'Enter organization address']) }}
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-actions col-md-12 ">
            <div class="pull-right">
                {{ Form::button('<i class="la la-check-square-o"></i>'.trans('labels.save'), ['id' => 'submitOrganization', 'type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('project-proposal-submitted.index') }}">
                    <button type="button" class="btn btn-warning mr-1">
                        <i class="la la-times"></i> @lang('labels.cancel')
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>

</div>

@push('page-js')
    <script>
        $(document).ready(function () {
            $(".addNewOrganization").hide();
            $('.organizationSelect').on('select2:select', function (e) {
                $('input,select,textarea').jqBootstrapValidation();
                var value = $(".organizationSelect option:selected").val();
                if (value === 'other_organization') {
                    $('input,select,textarea').jqBootstrapValidation('destroy');
                    $(".addNewOrganization").show();
                    $(".addOrganizationInput").focus();
                } else {
                    $(".addNewOrganization").hide();

                }
            });
            $("#submitOrganization").on('click', function () {
                $('input,select,textarea').jqBootstrapValidation('destroy');
                $('input,select,textarea').jqBootstrapValidation();
            })
        });
    </script>
@endpush