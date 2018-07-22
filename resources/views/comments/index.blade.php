@foreach ($article->comments as $comment)
	<p class="card-text">
		{{ $comment->body }}
	</p>
	<span class="small no-margin">
		<span class="card-subtitle mb-2 text-muted">
			{{ '@'.$comment->user->name }}
		</span> - 
		<i>{{ $comment->created_at->diffForHumans() }}</i>
	</span>
	<hr>
@endforeach