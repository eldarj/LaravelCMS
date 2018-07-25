<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	$articles = $tag->articles;

    	return view ('articles.index', compact('articles'));
    }
}
