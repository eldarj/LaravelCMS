<?php

namespace App;

// will extend eloquent model

class Article extends Model
{
	// will extend new eloquent model
	
	/**
	 * Relation
	 * @return relation returns many comments
	 */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Adds a new comment
     * @param string $body text of comment passed 
     */
    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }
}
