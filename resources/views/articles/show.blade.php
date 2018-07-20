@extends ('layouts.master')

@section ('content')
	<h1>Daily Blog</h1>
	<h2>
		{{$article->title}}
	</h2>
	<p>
		{{$article->body}}
	</p>
@endsection