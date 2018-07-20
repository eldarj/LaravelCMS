@extends ('layouts.master')

@section ('content')
	<h1>Daily Blog</h1>
	<h2>
		{{$task->title}}
	</h2>
	<p>
		{{$task->body}}
	</p>
@endsection