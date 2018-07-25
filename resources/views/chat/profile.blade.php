@extends ('layouts.master')

@section ('content')
	<div class="row">
		<div class="col-sm px-2">
			<h2>
				{{ $chatUser->name }}
			</h2>
			<p class="lead">
				Email: {{ $chatUser->user->email }}
			</p>
			<p class="small writer ml-1">{{ '@'.$chatUser->user->name }}</p>
			<hr>
		</div>
	</div>
@endsection