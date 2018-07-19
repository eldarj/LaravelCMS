<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    //
    public function index() 
    {
		$articles = Article::all();
		return view('articles.index', compact('articles'));
    }

    public function show(Article $article) 
    {
    	// $article = Article::find($article->id); we can avoid this

    	// return $article; //JSON

		// return view('articles.show', compact('article'));

		return view('articles.show', compact('article'));
    }
}
