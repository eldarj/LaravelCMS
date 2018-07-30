@extends ('layouts.master')

@section ('header')
	@include ('articles.header')
@endsection

@section ('content')

<div class="row">
	<div class="my-3 mx-2 p-3 bg-white rounded box-shadow col-sm">
		<h6 class="border-bottom border-gray pb-2 mb-0">Articles</h6>

		@foreach ($articles as $key => $article)
			<div class="media text-muted pt-3">
		      <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
		      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		        <div class="d-flex justify-content-between align-items-center w-100">
					<a href="/articles/{{ $article->id }}" target="_blank">
						<strong class="text-gray-dark">{{$article->title}}</strong>
					</a>
					<div>
			          <a href="#">Follow</a>
			          @if(auth()->user() && auth()->user()->canDelete())
		                {{ Form::open(array('url' => 'articles/' . $article->id, 'class' => 'd-inline-block')) }}
		                    {{ Form::hidden('_method', 'DELETE') }}
		                    {{ Form::submit('Delete', array('class' => 'btn btn-sm bg-danger text-white')) }}
		                {{ Form::close() }}
		              @endif
			      	</div>
		        </div>
		        <div class="d-flex justify-content-between align-items-center w-100">
		          <p>{{$article->body}}</strong>
		        </div>
		        <span class="d-block">{{ '@'.$article->user->name }} - {{ $article->created_at->toFormattedDateString('') }}</span>
		      </div>
		    </div>
		@endforeach

		<small class="d-block text-right mt-3">
		  <a href="/articles/create">Create new article</a>
		</small>
	</div>
</div>
<div class="row d-flex">
	<div class="px-2 col-sm full-height">
		<div class="h-100 p-3 bg-white rounded box-shadow archive-pills">
			<div class="small">
				<span class="text-muted mr-1">Search articles by archive:</span>
				@foreach ($archives as $arch)
					<a class="small text-light bg-dark p-1 px-2 rounded" href="{{ route('articles.archive', [$arch['year'], $arch['month']]) }}">{{ $arch['month'] }}.{{ $arch['year'] }} #{{ $arch['published'] }}</a>
				@endforeach
			</div>
			<div class="py-3 small">
			  <a href="/articles" class="float-right">All articles</a>
			</div>
		</div>
	</div>
	<div class="px-2 col-sm">
		<div class="h-100 p-3 bg-white rounded box-shadow tag-pills">
			<div class="small">
				<span class="text-muted mr-1">Search articles by tags:</span>
				@foreach ($tags as $tag)
					<a class="mx-1 text-danger" href="{{ route('articles.tags', [$tag]) }}">{{ $tag }}</a>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection