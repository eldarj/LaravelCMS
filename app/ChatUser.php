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
}
