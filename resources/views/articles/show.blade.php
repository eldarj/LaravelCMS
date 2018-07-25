@extends ('layouts.master')

@section ('content')
	<div class="row">
		<div class="col-sm px-2">
			<div class="small mb-4">
				@foreach ($article->tags as $tag)
					<a class="small bg-secondary rounded py-2 px-3 text-white" href="{{ route('articles.tags', [$tag]) }}">{{ $tag->name }}</a>
				@endforeach
			</div>
			<hr>
			<h2>
				{{$article->title}}
			</h2>
			<p class="lead">
				{{$article->body}}
			</p>
			<p class="small writer ml-1">By {{ '@'.$article->user->name }}</p>
			<hr>
			<div class="comments">
				<div class="card small">
					<div class="card-body">
						@include ('comments.index')
						@include ('comments.create')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection