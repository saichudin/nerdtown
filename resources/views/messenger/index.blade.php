@extends('front-base')

@section('content')

    <div class="container">
        <h1>My Messages</h1>
{{--        <a href="{{ route('messages.create') }}" class="btn-sm btn-primary" >Create New Message</a>--}}
        <br><br>
        @if(Session::has('error_message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error_message') }}</p>
        @endif
        <div class="row">
            <div class="col-3">
                <a href="{{ route('messages.broadcast') }}" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span>Broadcast Message to followers</a>
            </div>
        </div>
        <br>
        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
        <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
    </div>
@stop
