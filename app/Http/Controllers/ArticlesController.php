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

    public function create() {
        return view('articles.create');
    }

    public function store() {
        // create article model from post
        // $newArticle = new Article;

        // $newArticle->title = request('title');
        // $newArticle->body = request('body');
        // $newArticle->save();
        
        $this->validate(request(), [
            'title' => 'required|max:25',
            'body' => 'required|min:3'
        ]);

        Article::create(request(['title', 'body']));

        // redirect to index view
        return redirect('articles');
    }
}
