<?php

namespace App;

class Friends extends Model
{
	/**
	 * Relation
	 * @return relation returns single article
	 */
    public function giving()
    {
    	return $this->belongsTo(ChatUser::class, 'chat_user_id', 'id');
    }

    public function receiving()
    {
    	return $this->belongsTo(ChatUser::class, 'receiving_user_id', 'id');
    }
}
