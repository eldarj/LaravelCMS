<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Articles;
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
    public function index(Articles $articles) 
    {
        $articles = $articles->all();
		return view('articles.index', compact('articles'));
    }

    public function archive($year, $month)
    {
        $archive = Article::latest()
            ->filter(['year' => $year, 'month' => $month])
            ->get();

        return view('articles.index', ['articles' => $archive]);
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
