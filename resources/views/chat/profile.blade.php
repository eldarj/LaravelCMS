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
	<div class="avatar-container d-flex mb-2">
		<div class="avatar-wrap">
			<div class="col-sm">
				<div class="avatar-wrap rounded p-2 card border shadow">
					<div id="avatar" 
						 class="avatar-img" 
						 style="background-image:url('{{ $chatUser->avatar  }}')"
						 data-db-value="{{$chatUser->avatar}}"></div>
				</div>
			</div>
		</div>
		<div id="settings-button" class="settings-button">
			<button class="btn btn-light">
				<i class="fas fa-cog"></i>
			</button>
		</div>
	</div>
	<div class="d-flex profile-body-container">
		<div class="profile-preview-side flex-grow-1">
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
		<div id="profile-settings-side" class="profile-settings-side ml-2">
			@include('chat.settings')
		</div>
	</div>
	<hr>
@endsection
