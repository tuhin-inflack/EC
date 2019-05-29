<h4 class="form-section"><i class="la la-tag"></i>@lang('ims::inventory.already_bought_inventory')</h4>
<div class="row">
    <div class="col-md-12">
        @if ($errors->has('bought-category'))
            <span class="invalid-feedback" style="display: block">{{ $errors->first('bought-category') }}</span>
        @endif
        <div class="table-responsive form-group">
            <table class="table table-bordered repeater-bought-category-request">
                <thead>
                <tr>
                    <th width="50%">@lang('ims::product.title')</th>
                    <th width="15%">@lang('ims::inventory.unit')</th>
                    <th width="34%">@lang('labels.quantity')</th>
                    <th width="1%"><i data-repeater-create class="la la-plus-circle text-info" style="cursor: pointer"></i></th>
                </tr>
                </thead>
                <tbody data-repeater-list="bought-category">
                <tr data-repeater-item>
                    <td>
                        {!! Form::select('category_id',
                                $categories['bought'],
                                null,
                                ['class' => 'form-control repeater-select required']
                            )
                        !!}
                    </td>
                    <td class="show-unit-name"></td>
                    <td>
                        {{ Form::number('quantity', null, [
                            'class' => 'form-control',
                            'data-rule-min' => 1,
                            'data-msg-min'=> trans('validation.min.numeric', ['attribute' => trans('labels.quantity'), 'min' => 1]),
                            'data-rule-number' => 'true',
                            'data-msg-number' => trans('labels.Please enter a valid number'),
                        ]) }}
                    </td>
                    <td><i data-repeater-delete class="la la-trash-o text-danger" style="cursor: pointer"></i></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>