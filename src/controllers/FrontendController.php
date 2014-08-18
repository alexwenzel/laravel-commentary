<?php namespace Alexwenzel\LaravelCommentary;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller {

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