@extends ('layouts.master')

@section ('content')
	<div class="cover-container">
		<div class="cover-wrap">
			<div id="cover_photo" 
			     class="cover-img" 
			     style="background-image:url('{{ $chatUser->cover_photo  }}')"
				 data-db-value="{{$chatUser->cover_photo}}"></div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="avatar-container">
			<div class="col-sm">
				<div class="avatar-wrap rounded p-2 card">
					<div id="avatar" 
						 class="avatar-img" 
						 style="background-image:url('{{ $chatUser->avatar  }}')"
						 data-db-value="{{$chatUser->avatar}}"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm">
			<div class="card p-3">
				<h2 id="name" 
				    data-db-value="{{ $chatUser->name }}">
				    {{ $chatUser->name }}
				</h2>
				<p class="lead">
					Email: <span>{{ $chatUser->user->email }}</span>
				</p>
				<p class="description ml-1 font-italic" 
				   id="description" 
				   data-db-value="{{ $chatUser->description }}">
				   {{ $chatUser->description }}
				</p>
				<p class="small writer ml-1">{{ '@'.$chatUser->user->name }}</p>
			</div>
		</div>
		<div class="col-sm">
			@include('chat.settings')
		</div>
	</div>
	<hr>
@endsection
