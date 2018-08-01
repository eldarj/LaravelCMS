@if($chatUser->friend_relation->chat_user_id == auth()->user()->chatUser->id)
	<a href="" class="text-secondary small mr-1">Cancel request</a>
	<span href="{{ route('friends.add', ['chatUser' => $chatUser]) }}" class="btn btn-light text-secondary border rounded disabled">
		Friend request sent
	</span>
@elseif($chatUser->friend_relation->receiving_user_id == auth()->user()->chatUser->id)
	<span href="{{ route('friends.add', ['chatUser' => $chatUser]) }}" class="btn btn-info">
		Accept friend request
	</span>
@endif