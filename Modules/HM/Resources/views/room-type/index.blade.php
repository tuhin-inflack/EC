@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Room Types</div>

                    <div class="card-body">
                        @if(Session::get('message'))
                            <h4>
                                {{Session::get('message')}}
                            </h4>
                        @endif

                        <div class="float-right">
                            <a href="{{ route('room-types.create') }}" class="btn btn-primary">Create Room Type</a>
                        </div>
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Seat Capacity</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roomTypes as $roomType)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $roomType->name }}</td>
                                    <td>{{ $roomType->capacity }}</td>
                                    <td>
                                        <a href="{{ route('room-types.edit', $roomType->id) }}" class="btn btn-primary">Edit</a>
                                        {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => route('room-types.destroy', $roomType->id),
                                                'style' => 'display:inline'
                                                ]) !!}
                                        {!! Form::button('Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger',
                                        'title' => 'Delete the room type',
                                        'onclick'=>'return confirm("Confirm delete?")',
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $roomTypes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection