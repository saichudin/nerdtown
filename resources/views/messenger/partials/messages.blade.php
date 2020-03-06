<style>
    .chat {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .chat::after {
        content: "";
        clear: both;
        display: table;
    }

    .chat img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .chat img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    .chat h5.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }

    .chat img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }
</style>

@if ( Auth::user()->username ==  $message->user->username )
<div class="row">
    <div class="col-1">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->first_name) }} ?s=64" style="">
        <h5 style="">{{ $message->user->username }}</h5>
    </div>
    <div class="col-11">
        <div class="card ">
            <div class="card-body">
                <p>{{ $message->body }}</p>
                <div>
                    <small>At {{ $message->created_at }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-11">
        <div class="card ">
            <div class="card-body">
                <p>{{ $message->body }}</p>
                <div>
                    <small>At {{ $message->created_at }}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->first_name) }} ?s=64" style="">
        <h5 style=""><a href="{{ route('user.profile', $message->user->id) }}"> {{ $message->user->username }} </a></h5>
    </div>
</div>
@endif

{{--<div class="media">--}}
{{--    <a class="pull-left" href="#">--}}
{{--        <img src="//www.gravatar.com/avatar/{{ md5($message->user->first_name) }} ?s=64"--}}
{{--             alt="{{ $message->user->last_name }}" class="img-circle">--}}
{{--    </a>--}}
{{--    <div class="media-body">--}}
{{--        <h5 class="media-heading">{{ $message->user->username }}</h5>--}}
{{--        <p>{{ $message->body }}</p>--}}
{{--        <div class="text-muted">--}}
{{--            <small>Posted {{ $message->created_at->diffForHumans() }}</small>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

