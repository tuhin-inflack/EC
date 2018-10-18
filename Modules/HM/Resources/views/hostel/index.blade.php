@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hostels</div>

                    <div class="card-body">
                        @if(Session::get('message'))
                            <h4>
                                {{Session::get('message')}}
                            </h4>
                        @endif

                        <div class="float-right">
                            <a href="{{ route('hostels.create') }}" class="btn btn-primary">Create hostel</a>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Short code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total room</th>
                                    <th scope="col">Total seat</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hostels as $hostel)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $hostel->shortcode }}</td>
                                        <td>{{ $hostel->name }}</td>
                                        <td>{{ $hostel->total_room }}</td>
                                        <td>{{ $hostel->total_seat }}</td>
                                        <td>
                                            <a href="{{ route('hostels.edit', $hostel->id) }}"
                                               class="btn btn-primary">Edit</a>
                                            {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => route('hostels.destroy', $hostel->id),
                                                    'style' => 'display:inline'
                                                    ]) !!}
                                            {!! Form::button('Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger',
                                            'title' => 'Delete the hostel',
                                            'onclick'=>'return confirm("Confirm delete?")',
                                            )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{--<div class="float-right">--}}
                        {{--{{ $hostels->links() }}--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection