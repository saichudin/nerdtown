@extends('front-base')

@section('content')

    <div class="container">
        <h1>My Messages</h1>
{{--        <a href="{{ route('messages.create') }}" class="btn-sm btn-primary" >Create New Message</a>--}}
        <br><br>
        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
        <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
    </div>
@stop
