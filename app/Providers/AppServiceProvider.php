<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use \App\Billing\Stripe;
use \App\Article;
use \App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('articles.index', function($view){
            $archives = Article::archives();
            $tags = Tag::has('articles')->pluck('name');

            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function () {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
