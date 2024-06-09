<div style="color: white">

@foreach ($discussion as $discussion)
<h1>User: {{$user[$discussion->user_id - 1]->name}}</h1>
<h1>Título: {{$discussion->title}}</h1>
<h1>Content: {{$discussion->content}}</h1>
<br>
@endforeach
</div>