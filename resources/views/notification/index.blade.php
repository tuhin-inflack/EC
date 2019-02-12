@extends('layouts.master')
@section('title', trans('labels.User list'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10"><h4 class="card-title">Notifications</h4></div>
                            <div class="col-md-2 text-right"><a href="{{route('notification.clear')}}">Clear All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped alt-pagination">
                                <tbody>
                                @if($notifications->count() == 0)
                                    <tr>
                                        <td>
                                            No notifications available
                                        </td>
                                    </tr>
                                @else
                                    @foreach($notifications as $notification)
                                        <tr>
                                            <td>
                                                <a href="{{$notification->item_url}}">{{$notification->message}}</a><br/>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="{{$notification->created_at}}">{{$notification->created_at}}</time>
                                                </small>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{$notifications->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
