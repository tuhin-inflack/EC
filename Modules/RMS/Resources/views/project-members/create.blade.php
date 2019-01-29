@extends('rms::layouts.master')
@section('title', trans('rms::member.add_member'))

@section('content')
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">@lang('rms::member.add_member')</h4>
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
                        {!! Form::open(['route' =>  ['rms-organization-members.store', $organization->id], 'files' => true, 'class' => 'form',' novalidate']) !!}
                        @include('rms::project-members.form.add_edit_organization_member_form', ['mode' => trans('rms::member.add_member'), 'form-mode' => trans('rms::member.member_editing_form')])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="organization-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Member list</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.name')</th>
                                        <th scope="col">@lang('labels.mobile')</th>
                                        <th scope="col">@lang('labels.address')</th>
                                        <th scope="col">@lang('labels.gender')</th>
                                        <th scope="col">@lang('labels.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($organization->members)>0)
                                        @foreach($organization->members as $members)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{ $members->name }}</td>
                                                <td>{{ $members->mobile }}</td>
                                                <td>{{ $members->address }}</td>
                                                <td>{{ $members->gender }}</td>
                                                <td>
                                                <span class="dropdown">
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{route('member.edit-org-member', $members->id)}}" class="dropdown-item"><i class="ft-edit"></i> @lang('labels.edit')</a>
                                                    </span>
                                                </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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