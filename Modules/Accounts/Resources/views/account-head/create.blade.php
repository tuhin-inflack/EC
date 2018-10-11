@extends('accounts::layouts.master')

@section('content')
    <form action="{{ url('accounts/account-head') }}" method="post" role="form" id="add_form">
        {{--@method('PUT')--}}
        @csrf
    <div class="modal-body has-padding">

        <div class="form-group">
            <label>Account Parent Head</label>
            <select name="parent_id">
                <option value="1">Assets</option>
                <option value="2">Liability</option>
                <option value="3">Income</option>
                <option value="4">Expense</option>
            </select>
        </div>

        <div class="form-group">
            <label>Account Head Name</label>
            <input type="text" placeholder="e.g. Fixed Assets" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label>Account Head Code</label>
            <input type="text" placeholder="e.g. A0001" class="form-control" name="code">
        </div>

        <div class="form-group">
            <label>Account Head Type</label>
            <select name="head_type">
                <option value="1">Assets</option>
                <option value="2">Liability</option>
                <option value="3">Income</option>
                <option value="4">Expense</option>
            </select>
        </div>

        <div class="form-group">
            <label>Account Head Type</label>
            <textarea name="description" rows="2"></textarea>
        </div>

    </div>
    <div class="modal-footer">
        {{--<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>--}}
        <button type="submit" class="btn btn-primary">Submit </button>
    </div>
    </form>
@stop
