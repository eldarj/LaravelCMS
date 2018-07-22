<?php

namespace App\Repositories;

use App\Article;

class Articles
{
	public function all()
	{
		return Article::all();
	}
}