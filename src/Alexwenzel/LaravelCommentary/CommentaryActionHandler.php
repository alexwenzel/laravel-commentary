<?php namespace Alexwenzel\LaravelCommentary;

use Alexwenzel\LaravelCommentary\Comment;

class CommentaryActionHandler {

    /**
     * Dependency
     * @var Comment
     */
    protected $model;

    /**
     * Constructor
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    /**
     * Index Method
     * @return Collection
     */
    public function index()
    {
        return $this->model
            ->orderBy('status', 'asc')
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Find Method
     * @param  mixed $id
     * @return Comment
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Comment Rules
     * @return array
     */
    public function comment_rules()
    {
        return array(
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'text' => 'required',
        );
    }

    /**
     * Actionhandler for posted comment forms
     * @param  array $data
     * @return Comment
     */
    public function comment_post($data)
    {
        return $this->model->create($data);
    }

    /**
     * Actionhandler for comment edit form
     * @param  mixed $id
     * @param  array $data
     * @return bool|null
     */
    public function comment_edit($id, $data)
    {
        if ( $data['action'] == 'trash') {
            return $this->comment_trash($id, $data);
        }

        // update comment data
        $comment = $this->find($id);
        $comment->update($data);

        if ( $data['action'] == 'approve') {
            return $this->comment_approve($id);
        }

        return $this->comment_unapprove($id);
    }

    /**
     * Approves a comment
     * @param  mixed $id
     * @return bool
     */
    public function comment_approve($id)
    {
        $comment = $this->find($id);
        return $comment->approve();
    }

    /**
     * Unapproves a comment
     * @param  mixed $id
     * @return bool
     */
    public function comment_unapprove($id)
    {
        $comment = $this->find($id);
        return $comment->unapprove();
    }

    /**
     * Trashes a comment
     * @param  mixed $id
     * @return bool|null
     */
    public function comment_trash($id)
    {
        $comment = $this->find($id);
        return $comment->delete();
    }

}