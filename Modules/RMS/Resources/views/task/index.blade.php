<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 1/20/19
 * Time: 4:56 PM
 */
?>
@extends('pms::layouts.master')
@section('title', __('pms::task.title'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('pms::task.card_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{route('task.create', $project->id)}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> {{trans('pms::task.create_button')}}</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <center>
                            <label><strong>{{trans('pms::project_proposal.project_title')}}:</strong> <span class="alert bg-info">{{$project->title}}</span></label>
                        </center>
                        <div class="card-body card-dashboard">
                           @include('task.home', ['page' => 'index'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

