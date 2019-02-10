@extends('layouts.master')
@section('title', trans('labels.User list'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Notifications</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped alt-pagination">
                                <tbody>
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td>
                                            <a href="{{$notification->item_url}}">{{$notification->message}}</a><br/>
                                            <small><time class="media-meta text-muted" datetime="{{$notification->created_at}}">{{$notification->created_at}}</time></small>
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
    </section>
@endsection
