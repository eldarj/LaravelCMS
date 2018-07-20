<?php

namespace App;

class Comment extends Model
{
	/**
	 * Relation
	 * @return relation returns single article
	 */
    public function article()
    {
    	return $this->belongsTo(Article::class);
    }
}
