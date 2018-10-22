@extends('pms::layouts.master')

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
                        <a href="{{ route('project_request.create')  }}" class="btn btn-primary">Create Project
                            Request</a>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Send to</th>
                                <th scope="col">Message</th>
                                <th scope="col">Last date</th>
                                <th scope="col">Attachment</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projectRequests as $projectRequest)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $projectRequest->send_to }}</td>
                                <td>{{ $projectRequest->message }}</td>
                                <td>{{ $projectRequest->end_date }}</td>

                                <td>
                                    {{ $projectRequest->attachment }}

                                </td>
                                <td>
                                    <a href="{{ route('project_request.edit', $projectRequest->id)  }}"
                                       class="btn btn-primary">Edit</a>

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