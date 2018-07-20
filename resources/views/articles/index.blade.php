@extends ('layouts.master')

@section ('content')

<div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Articles</h6>
        
		@foreach ($articles as $key => $article)
			<div class="media text-muted pt-3">
	          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
	          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	            <div class="d-flex justify-content-between align-items-center w-100">
				<a href="/articles/{{ $article->id }}" target="_blank">
					<strong class="text-gray-dark">{{$article->title}}</strong>
				</a>
	              <a href="#">Follow</a>
	            </div>
	            <div class="d-flex justify-content-between align-items-center w-100">
	              <p>{{$article->body}}</strong>
	            </div>
	            <span class="d-block">@username - {{ $article->created_at->toFormattedDateString('') }}</span>
	          </div>
	        </div>
		@endforeach

        <small class="d-block text-right mt-3">
          <a href="/articles">All articles</a>
          <a href="/articles/create">Create new article</a>
        </small>
      </div>

@endsection