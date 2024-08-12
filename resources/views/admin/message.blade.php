@extends('layouts.admin_master')
@section('admin')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Chat</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chat <small>Conversation</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box chat-box table-responsive">
                                    <div class="chat-history" id="chat-history">
                                        @foreach ($messages as $message)
                                            <div class="message {{ $message->sender_id == Auth::user()->id ? 'right' : 'left' }}">
                                                <div class="message-content">
                                                    <p>{{ $message->message }}</p>
                                                    <span class="time">{{ $message->created_at->format('h:i A') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <form action="{{ route('storeMessage') }}" method="POST">
                                        @csrf
                                        <div class="chat-input">
                                            <input type="text" name="message" class="form-control" placeholder="Type your message here...">
                                            <input type="hidden" name="receiver_id" value="1"> <!-- Change this dynamically if needed -->
                                            <button class="btn btn-primary" type="submit">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
