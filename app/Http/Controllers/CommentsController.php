<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Article;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOldMethod(Article $article)
    {
        $this->validate(request(), [
            'body' => 'required|min:5|max:150'
        ]);

        Comment::create([
            'body' => request('body'), 
            'article_id' => $article->id
        ]);

        // redirect to index view
        return back();
    }

    /**
     * Stores a comment using eloquent article
     * @param  Article $article 
     * @return helper           back to where form was posted from
     */
    public function store(Article $article)
    {
        $this->validate(request(), [
            'body' => 'required|min:5|max:150'
        ]);

        $article->addComment(request('body'));

        return back();
    }
}
