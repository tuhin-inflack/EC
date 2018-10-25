@extends('pms::layouts.master')
@section('title', 'All Project Proposal Request ')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Proposal Request List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{route('project_request.create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> New Proposal Request</a>
                            <a href="{{route('project_request.create')}}" class="btn btn-warning btn-sm"> <i
                                        class="ft-download white"></i></a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Send to</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Last date</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projectRequests as $projectRequest)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $projectRequest->send_to }}</td>
                                            <td>{{ $projectRequest->title }}</td>
                                            <td>{{ $projectRequest->message }}</td>
                                            <td>{{ $projectRequest->end_date }}</td>

                                            <td>
                                                {{  $exists = Storage::disk('internal')->exists($projectRequest->attachment) }}

                                                <a href="" onclick="attachmentDev()">Attachment </a>

                                            </td>
                                            <td>
                                                @if($projectRequest->status == 0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($projectRequest->status == 1)
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{ route('project_request.show',$projectRequest->id) }}" class="dropdown-item"><i class="ft-eye"></i> Details</a>

                                                <a href="{{ route('project_request.edit', $projectRequest->id)  }}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => route('project_request.destroy', $projectRequest->id),
                                                    'style' => 'display:inline'
                                                    ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> Delete ', array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the hostel',
                                                  'onclick'=>'return confirm("Confirm delete?")',
                                                  )) !!}
                                                  {!! Form::close() !!}

                                              </span>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('page-js')
    <script>
        function attachmentDev() {
            alert("Download process is in under development");
        }
    </script>
@endpush
