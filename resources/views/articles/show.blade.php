@extends ('layouts.master')

@section ('content')
	<p class="small writer">{{ '@'.$article->user->name }}</p>
	<h2>
		{{$article->title}}
	</h2>
	<p>
		{{$article->body}}
	</p>
	<div class="comments">
		<div class="card">
			<div class="card-body">
				@include ('comments.index')
				@include ('comments.create')
			</div>
		</div>
	</div>
@endsection