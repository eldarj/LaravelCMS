@extends ('layouts.master')

@section ('header')
	@include ('articles.header')
@endsection

@section ('content')

<div class="row">
	<div class="my-3 mx-2 p-3 bg-white rounded box-shadow col-sm">
		<h6 class="border-bottom border-gray pb-2 mb-0">Welcome to the Chat</h6>

		@foreach ($messages as $key => $message)
			<div class="my-3 media text-muted pt-3">
		      <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
		      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		        <div class="w-30">
		          <span class="rounded-circle bg-dark shadow p-1 text-info">
		          	{{ '@'.$message->user->chatUser->name }}
		          </span>
		          <span class="m-2 p-3 rounded bg-light shadow p-1 text-dark">
		          	{{ $message->message_text }}
		      	  </span>
		          <span class="m-2 small text-info">
		          	{{ $message->created_at->toFormattedDateString('') }}
		          </span>
		        </div>
		      </div>
		    </div>
		@endforeach

		<small class="d-block text-right mt-3">
		  @include ('chat.write')
		</small>
	</div>
</div>
@endsection