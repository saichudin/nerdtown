@extends('front-base')

@section('content')

    <div class="container pt-4">
        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </div>
@stop
