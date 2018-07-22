<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Get all latest aricles
     * @return view - array
     */
    public function index() 
    {
		$articles = Article::latest()->get();

        $archives = Article::selectRaw('year(created_at) as year, month(created_at) as month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();

		return view('articles.index', compact('articles', 'archives'));
    }

    public function archive($year, $month)
    {
        $archives = Article::selectRaw('year(created_at) as year, month(created_at) as month, count(*) published')
        ->groupBy('year', 'month')
        ->get()
        ->toArray();

        return $archives;
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

        auth()->user()->publish(
            new Article(request(['title','body']))
        );

        // Another method
        // Article::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);

        // redirect to index view
        return redirect('articles');
    }
}
