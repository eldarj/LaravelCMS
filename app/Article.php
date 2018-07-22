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
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year, month(created_at) as month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month'])
        {
            $query->whereMonth('created_at', $month);
        }
        if ($year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }
}
