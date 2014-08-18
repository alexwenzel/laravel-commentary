<?php namespace Alexwenzel\LaravelCommentary;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use Alexwenzel\LaravelCommentary\CommentaryActionHandler;

class CommentsController extends Controller {

    /**
     * Actionhandler Dependency
     * 
     * @var CommentaryActionHandler
     */
    protected $actionhandler;

    /**
     * Inject Dependency
     * 
     * @param CommentaryActionHandler $actionhandler
     */
    public function __construct(CommentaryActionHandler $actionhandler)
    {
        $this->actionhandler = $actionhandler;
    }

    /**
     * Display a listing of posts
     *
     * @return Response
     */
    public function getIndex()
    {
        $comments = $this->actionhandler->index();
        return View::make('laravel-commentary::index', compact('comments'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $comment = $this->actionhandler->find($id);
        return View::make('laravel-commentary::edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        $validator = Validator::make($data = Input::all(), $this->actionhandler->comment_rules());

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->actionhandler->comment_edit($id, $data);

        return Redirect::action('Alexwenzel\LaravelCommentary\CommentsController@getIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getTrash($id)
    {
        $this->actionhandler->comment_trash($id);
        return Redirect::action('Alexwenzel\LaravelCommentary\CommentsController@getIndex');
    }

    /**
     * Approve the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getApprove($id)
    {
        $this->actionhandler->comment_approve($id);
        return Redirect::action('Alexwenzel\LaravelCommentary\CommentsController@getIndex');
    }

    /**
     * Unapprove the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getUnapprove($id)
    {
        $this->actionhandler->comment_unapprove($id);
        return Redirect::action('Alexwenzel\LaravelCommentary\CommentsController@getIndex');
    }

    /**
     * Handler for the submitted comment form
     * @return Response
     */
    public function postComment()
    {
        $validator = Validator::make($data = Input::all(), $this->actionhandler->comment_rules());

        if ($validator->fails())
        {
            return Redirect::back()
                ->with('laravelcommentary.message', Lang::get('laravel-commentary::messages.post_fails'))
                ->withErrors($validator)->withInput();
        }

        $model = $this->actionhandler->comment_post($data);

        return Redirect::back()
            ->with('laravelcommentary.message', Lang::get('laravel-commentary::messages.post_success'));
    }

}