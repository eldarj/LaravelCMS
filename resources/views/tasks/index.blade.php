@extends ('layouts.master')

@section ('content')

<div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Tasks</h6>
        
		@foreach ($tasks as $key => $task)
			<div class="media text-muted pt-3">
	          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
	          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	            <div class="d-flex justify-content-between align-items-center w-100">
	              <strong class="text-gray-dark">{{$task->title}}</strong>
	            </div>
	            <div class="d-flex justify-content-between align-items-center w-100">
	              <p>{{$task->body}}</strong>
	            </div>
	            <span class="d-block">@username</span>
	          </div>
	        </div>
		@endforeach

        <small class="d-block text-right mt-3">
          <a href="/tasks">All tasks</a>
        </small>
      </div>

@endsection