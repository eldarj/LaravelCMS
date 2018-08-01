@foreach($friends as $request)
<div class="dropdown-item friend-request px-2 d-flex flex-row">
    <div class="friend-request-details small mr-5">
        <a href="{{route('profile', ['id' => $request->giving->name])}}" class="d-flex flex-row align-items-center">
            <div class="avatar-wrap rounded-circle card border">
               <div class="avatar-img rounded-circle wh-35" style="background-image: url('{{$request->giving->avatar}}')"></div>
            </div>
            <span class="request-name text-dark mx-2">{{$request->giving->name}}</span>
        </a>
    </div>
    <div class="friend-request-actions d-flex flex-row align-items-center mx-2 ml-auto">
        <a href="{{ route('friends.confirm', ['friend' => $request->chat_user_id]) }}" 
           class="text-white bg-dark px-1 rounded small"
           data-ajax-request data-ajax-target="friends-requests" data-ajax-action="{{ route('friends.confirm', ['friend' => $request->chat_user_id]) }}" data-ajax-method="get">Accept</a>
        <a href="" class="text-secondary small mx-2">Ignore</a>
    </div>          
</div>
@endforeach
@if(!count($friends))
  <div class="dropdown-item friend-request no-requests px-2 small">
    @include('friends.pronadji')
  </div>
@endif