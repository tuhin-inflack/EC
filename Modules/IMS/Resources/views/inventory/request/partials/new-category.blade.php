<h4 class="form-section"><i class="la la-tag"></i> @lang('labels.new') @lang('ims::inventory.inventory_request')</h4>
<div class="row">
    <div class="col-md-12">
        @if ($errors->has('new-category'))
            <span class="invalid-feedback" style="display: block">{{ $errors->first('new-category') }}</span>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered repeater-new-category-request">
                <thead>
                <tr>
                    <th>@lang('ims::product.title') @lang('labels.name')</th>
                    <th>@lang('ims::inventory.unit')</th>
                    <th width="20%">@lang('ims::inventory.type')</th>
                    <th>@lang('labels.quantity')</th>
                    <th width="1%"><i data-repeater-create class="la la-plus-circle text-info" style="cursor: pointer"></i></th>
                </tr>
                </thead>
                <tbody data-repeater-list="new-category">
                <tr data-repeater-item>
                    <td>
                        {{ Form::text('name',
                                null,
                                [
                                    'class' => 'form-control category-unique-check required'
                                ]
                            )
                        }}
                    </td>
                    <td>
                        {{ Form::text('unit',
                                null,
                                ['class' => 'form-control']
                            )
                        }}
                    </td>
                    <td>
                        {!! Form::select('type',
                                [
                                    '1' => trans('ims::inventory.fixed_asset'),
                                    '2' => trans('ims::inventory.stationery'),
                                ],
                                null,
                                ['class' => 'form-control repeater-select required']
                            )
                        !!}
                    </td>
                    <td>
                        {{ Form::number('quantity',
                                null,
                                [
                                    'class' => 'form-control',
                                    'data-rule-min' => 1,
                                    'data-msg-min'=> trans('validation.min.numeric', ['attribute' => trans('labels.quantity'), 'min' => 1]),
                                    'data-rule-number' => 'true',
                                    'data-msg-number' => trans('labels.Please enter a valid number'),
                                ]
                            )
                        }}
                    </td>
                    <td><i data-repeater-delete class="la la-trash-o text-danger" style="cursor: pointer"></i></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>