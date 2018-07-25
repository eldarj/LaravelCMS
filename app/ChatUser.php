<?php

namespace App;

class ChatUser extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }
}
