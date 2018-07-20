@extends ('layouts.master')

@section ('content')
	<h2>
		{{$article->title}}
	</h2>
	<p>
		{{$article->body}}
	</p>
	<div class="comments">
		@foreach ($article->comments as $comment)
		<div class="card">
			<div class="card-body">
				<h6 class="card-subtitle mb-2 text-muted">
					@username - {{ $comment->created_at }}
				</h6>
				<p class="card-text">
					{{ $comment->body }}
				</p>
			</div>
		</div>
		@endforeach
	</div>
@endsection