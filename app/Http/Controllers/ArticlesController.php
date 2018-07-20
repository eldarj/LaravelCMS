<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    /**
     * Get all latest aricles
     * @return view - array
     */
    public function index() 
    {
		$articles = Article::latest()->get();
		return view('articles.index', compact('articles'));
    }

    /**
     * Display one single article by id
     * @param  Article $article passed in url
     * @return view           object
     */
    public function show(Article $article) 
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Redirect to create view
     * @return view
     */
    public function create() {
        return view('articles.create');
    }

    /**
     * Stores an article from post request
     * @return redirect uri
     */
    public function store() {
        $this->validate(request(), [
            'title' => 'required|max:25',
            'body' => 'required|min:3'
        ]);

        Article::create(request(['title', 'body']));

        // redirect to index view
        return redirect('articles');
    }
}
