@extends ('layouts.master')

@section ('header')
	@include ('chat.header')
@endsection

@section ('content')

<h4 class="border-bottom border-gray pb-2 mb-3">Your friends</h6>
<div class="friends-container">
	@foreach ($friends as $key => $friend)
	<div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
        <div class="friends-avatar mw-25 p-2 mr-2">
        	<div class="border profile-pic friends-profile-img rounded-circle"
				 style="background-image:url('{{$friend->receiving->avatar}}');"></div>
        </div>
        <div class="details mw-75 d-flex flex-column p-2">
        	<div class="d-block mw-100">
        		<div class="friend-name flex-grow">
        		<span class="text-dark">{{$friend->receiving->name}}</span>
		        </div>
		        <div class="friends-since mw-25">
		        	<span class="text-secondary">{{$friend->modified_at}}</span>
		        </div>
        	</div>
        	<div class="d-block mw-100">
        		<a href="/profile/{{$friend->receiving->name}}" class="small">Visit profile</a>
        	</div>
        </div>
	</div>
	@endforeach
</div>
@endsection