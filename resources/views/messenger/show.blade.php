@extends('front-base')

@section('content')
    <div class="container">
        <h1>Subject: {{ $thread->subject }}</h1> <br><br>
        @each('messenger.partials.messages', $thread->messages, 'message')
        <br><br>
{{--        {{ dd(count($thread->participants)) }}--}}
        @if (count($thread->participants) > 2)
            <p>This is broadcast message, you cannot add message</p>
        @else
            @include('messenger.partials.form-message')
        @endif
    </div>
@stop
