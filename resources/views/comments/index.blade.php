@foreach ($article->comments as $comment)
	<h6 class="card-subtitle mb-2 text-muted">
		@username
	</h6>
	<p class="card-text">
		{{ $comment->body }}
	</p>
	<span class="small no-margin">
		<i>{{ $comment->created_at->diffForHumans() }}</i>
	</span>
	<hr>
@endforeach