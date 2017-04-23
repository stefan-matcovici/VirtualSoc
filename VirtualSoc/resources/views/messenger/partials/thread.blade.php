<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="card col-md-6 offset-md-3 mb-4">
    <div class="card-header">
        <h4><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
    </div>
    <div class="card-block">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Last message: "{{ $thread->latestMessage->body }}"</li>
            <li class="list-group-item"><small><strong>Creator:</strong> {{ $thread->creator()->name }}</small></li>
            <li class="list-group-item"> <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small></li>
        </ul>
    </div>
</div>