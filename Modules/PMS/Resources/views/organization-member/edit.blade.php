@extends($module . '::layouts.master')
@section('title', trans('member.edit_member'))

@section('content')
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">@lang('member.edit_member')</h4>
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
                        {!! Form::model($member, ['route' =>  [$module . '-organization-members.update', $organization->id, $member->id], 'method' => 'PUT', 'class' => 'form']) !!}
                        @include('pms::organization-member.partials.create_edit_form', [
                            'mode' => trans('member.edit_member'),
                            'form-mode' => trans('member.member_adding_form')
                        ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection