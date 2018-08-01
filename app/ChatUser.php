<?php

namespace App;

class ChatUser extends Model
{
    /**
     * Relation
     * @return relation returns many comments
     */
    public function friends()
    {
        return $this->hasMany(Friends::class);
    }

    public function friend_requests()
    {
        return $this->hasmany(Friends::class, 'receiving_user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }

    public function addFriend($receiving_user_id)
    {
        $this->friends()->create($receiving_user_id);
    }

    /**
     * Retrieves the friends relation, useful forchecking friendship relations
     * @param  ChatUser $chatUser
     * @return Friends friends relation (use columns to check direction)
     */
    public function are_friends(ChatUser $chatUser)
    {
        if ($sent = $this->sent_request_to($chatUser)) 
        {
            return $sent->first(); 
        }

        if ($received = $this->received_request_from($chatUser)) {
            return $received->first();
        }
    }

    /**
     * Retrieves and checks the sent request from 1st to 2nd User
     * @param  ChatUser $chatUser user that is being checked against
     * @return Friends - friends relation or false
     */
    public function sent_request_to(ChatUser $chatUser)
    {
        if (count($this->friends->where('receiving_user_id', $chatUser->id)))
        { 
            return $this->friends->where('receiving_user_id', $chatUser->id);
        }
        return false;
    }

    /**
     * Retrieves and checks the received request from 2nd to 1st User
     * @param  ChatUser $chatUser user that is being checked against
     * @return Friends - friends relation or false
     */
    public function received_request_from(ChatUser $chatUser)
    {
        if (count($this->friend_requests->where('chat_user_id', $chatUser->id)))
        {
            return $this->friend_requests->where('chat_user_id', $chatUser->id);
        }
        return false;
    }
}
