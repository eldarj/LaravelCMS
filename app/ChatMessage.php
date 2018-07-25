<?php

namespace App;

class ChatMessage extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
