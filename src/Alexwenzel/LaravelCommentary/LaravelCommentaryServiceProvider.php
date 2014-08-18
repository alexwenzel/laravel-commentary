<?php namespace Alexwenzel\LaravelCommentary;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Alexwenzel\LaravelCommentary\Comment;

class LaravelCommentaryServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // custom namespace
        $this->package('alexwenzel/laravel-commentary', 'laravel-commentary');

        // comment list composer
        View::composer('laravel-commentary::comment-list', function($view)
        {
            $entity = $view->entity;

            $comments = Comment::where('entity', $entity)
                ->where('status', Comment::statusApproved)
                ->orderBy('created_at', 'desc')
                ->get();

            $view->with('comments', $comments);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        App::bind('laravel-commentary.actionhandler', function()
        {
            return new CommentaryActionHandler;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('laravel-commentary.actionhandler');
    }

}
