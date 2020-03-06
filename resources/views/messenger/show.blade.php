@extends('front-base')

@section('content')
    <div class="container">
        <h1>Subject: {{ $thread->subject }}</h1> <br><br>
        @each('messenger.partials.messages', $thread->messages, 'message')
        <br><br>
        @include('messenger.partials.form-message')
    </div>
@stop
