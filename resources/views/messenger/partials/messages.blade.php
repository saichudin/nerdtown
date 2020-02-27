<div class="media">
    <a class="pull-left" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->first_name) }} ?s=64"
             alt="{{ $message->user->last_name }}" class="img-circle">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->username }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
