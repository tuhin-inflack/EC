@extends('pms::layouts.master')
@section('title', 'Attribute Details')

@section('content')
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a> >
                            <a href="{{ route('pms-organizations.show', [$project->id, $organization->id]) }}">{{ $organization->name }}</a>
                            >
                            <a href="{{ route('organization-members.show', [$project->id, $organization->id, $member->id]) }}">{{ $member->name }}</a>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-3">Name</dt>
                                    <dd class="col-sm-9">{{ $attribute->name }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Inital Value</dt>
                                    <dd class="col-sm-9">{{ number_format($attributeValue->initial_value, 2) }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Current Balance</dt>
                                    <dd class="col-sm-9">{{ number_format($attributeValue->current_balance, 2) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection