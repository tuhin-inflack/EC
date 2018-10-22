@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Hostel Room Creation</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center"
                                            colspan="{{ ceil($hostel->total_room / $hostel->level) + 1 }}">{{ $hostel->name }} ({{ $hostel->shortcode }})</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $width =  (85 / ceil($hostel->total_room / $hostel->level))
                                    @endphp

                                    @for($level = $hostel->level; $level >= 0; $level--)
                                        <tr>
                                            <td width="15%">F - {{ $level }}</td>
                                            @for($room = 0; $room < ceil($hostel->total_room / $hostel->level); $room++)
                                                <td width="{{ $width }}%">
                                                    <input type="checkbox" name="level">
                                                    {{ $level . ', ' . $room }}
                                                </td>
                                            @endfor
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
