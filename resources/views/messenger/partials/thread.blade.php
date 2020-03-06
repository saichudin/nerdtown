<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="card ">
    <div class="card-header {{ $class }}">
        <h5 class="media-heading">
            <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
            ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
        </h5>
    </div>
    <div class="card-body">
        {{ $thread->latestMessage->body }}
        <div>
            <strong>From:</strong> {{ $thread->creator()->username }}
            <strong>To:</strong> {{ $thread->participantsString(Auth::id(), ['username']) }}
            on 2 Aug 2013
        </div>
    </div>
</div>
