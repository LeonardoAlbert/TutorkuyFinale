@extends('layouts.app')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container chat">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                    @foreach($chatRooms as $cr)
                    <div class ="select-chat-room" id="{{$cr->id}}">
                    @if($selected == $cr->id)
                        <li class="clearfix  active list-chat-people" id="{{$cr->id}}">
                    @else
                        <li class="clearfix list-chat-people" id="{{$cr->id}}">
                    @endif
                    @if($user->role == 0)
                            <img src="/storage/{{$cr->tutor->image}}" alt="avatar">
                            <div class="about detail">
                                <div class="name">{{$cr->tutor->name}}</div>
                                @if($cr->tutor->verif == 1)
                                <div class="status"> <i class="fa fa-check"></i> verified tutor</div>
                                @else
                                <div class="status"></i> un-verified tutor </div>
                                @endif
                            </div>
                            @else
                            <img src="/storage/{{$cr->student->image}}" alt="avatar">
                            <div class="about">
                                <div class="name">{{$cr->student->name}}</div>
                                @if($cr->student->verif == 1)
                                <div class="status"> <i class="fa fa-check"></i> verified student</div>
                                @else
                                <div class="status"></i> un-verified student </div>
                                @endif
                            @endif
                        </li>
                        </div>
                    @endforeach
                    </ul>
                </div>
                @if ($selected != 0)
                <div class="chat box" id="chat-box-container">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="/storage/{{$selectedUser->image}}" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0" style="margin: 0">{{$selectedUser->name}}</h6>
                                    @if($selectedUser->verif == 1)
                                    <small>verified</small>
                                    @else
                                    <small>un-verified</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0">
                            @foreach ($messages as $msg)
                            @if($user->id == $msg->sender_id)
                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">{{$msg->created_at->isoFormat('dddd, DD-MM-Y H:mm')}}</span>
                                </div>
                                <div class="message my-message">{{$msg->message}}</div>
                            </li>
                            @else
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time">{{$msg->created_at->isoFormat('dddd, DD-MM-Y H:mm')}}</span>
                                    <img src="/storage/{{$selectedUser->image}}" alt="avatar">
                                </div>
                                <div class="message other-message float-right">{{$msg->message}}</div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <form action="/chat" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-send"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter text here..." name="message">
                                <input type="hidden" name="roomId" value="{{$selected}}">
                                <input type="hidden" name="senderId" value="{{$user->id}}">
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

