@extends('front-base')

@section('content')

    <div class="container">
        <a href="{{ route('messages.create') }}" class="btn-sm btn-primary" >Create New Message</a>
        <br><br>
        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </div>
@stop
