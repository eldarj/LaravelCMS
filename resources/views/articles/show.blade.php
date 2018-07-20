@extends ('layouts.master')

@section ('content')
	<h2>
		{{$article->title}}
	</h2>
	<p>
		{{$article->body}}
	</p>
	<div class="comments">
		<div class="card">
			<div class="card-body">
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
			</div>
		</div>
	</div>
@endsection