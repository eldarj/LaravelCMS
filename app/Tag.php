<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }
}
