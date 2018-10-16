<div class="row">
    <h3 class="col-md-6 offset-2">
        Create New Role
    </h3>
</div>
<div class="row">
    <div class="col-md-6 offset-md-2">
        {!! Form::open(['url' =>  '/user/role']) !!}

        <div class="form-group form-float">
            <div class="form-line">
                <input name="name" type="text" id="name" class="form-control" required>
                <label class="form-label"><span style="color: red">*</span> Name eg: ROLE_ADMIN</label>
            </div>
            @if ($errors->has('name'))
                <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
            @endif
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <input name="description" type="textarea" id="description" class="form-control" required>
                <label class="form-label"><span style="color: red">*</span> Description</label>
            </div>
            @if ($errors->has('description'))
                <label id="description-error" class="error"
                       for="description">{{ $errors->first('description') }}</label>
            @endif
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                {{ Form::select("head_type", , null, ["class"=>"form-control show-tick", "id"=>"permissions",
                 'multiple','name'=>'permissions[]', 'required'=>true]) }}
            </div>
            @if ($errors->has('permissions'))
                <label id="permissions-error" class="error"
                       for="permissions">{{ $errors->first('permissions') }}</label>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-lg btn-success waves-effect">
                <span>Create</span>
            </button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
