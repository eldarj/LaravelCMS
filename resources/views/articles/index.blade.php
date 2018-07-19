@extends ('layout')

@section ('content')

<div class="articles-head">
	Welcome to my articles
</div>
<div class="articles">
	@foreach ($articles as $key => $article)
		<a href="/articles/{{$article->id}}" target="_blank">
			<h1>{{$article->title}}</h1>
			<p>{{$article->body}}</p>
		</a>
	@endforeach
</div>

@endsection

@section ('footer')
foooo footer 
@endsection