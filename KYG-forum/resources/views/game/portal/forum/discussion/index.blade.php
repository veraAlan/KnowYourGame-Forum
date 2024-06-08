@include('game.portal.forum.discussion.partials.create')




<div style="color: white">
    <p>Titulo: <a
            href="{{ route('game.portal.forum.discussion.reply', ['game' => $game, 'portal' => $portal, 'forum' => $forum, 'discussion' => $discussion]) }}">{{ $discussion->title }}</a>
    </p>
    <p>Content: {{ $discussion->content }}</p>
    <br>
</div>--
