<?php namespace Alexwenzel\LaravelCommentary;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Comment extends \Eloquent {

    use SoftDeletingTrait;

    /**
     * Unapproved Comment
     */
    const statusUnapproved = 0;

    /**
     * Approved Comment
     */
    const statusApproved = 1;

    /**
     * table name
     * @var string
     */
    protected $table = 'laravel-commentary-comments';

    /**
     * mass assignment
     * @var array
     */
    protected $fillable = [
        'entity',
        'name',
        'email',
        'text',
    ];

    /**
     * Softdelete column
     * @var string
     */
    protected $dates = ['deleted_at'];

    /**
     * Status text for management view
     * @return string
     */
    public function statusText()
    {
        if ($this->status === 1) {
            return Lang::get('laravel-commentary::messages.status_approved');
        }

        return Lang::get('laravel-commentary::messages.status_unapproved');
    }

    /**
     * Process to approve a comment
     * @return bool
     */
    public function approve()
    {
        $this->attributes['status'] = self::statusApproved;
        return $this->save();
    }

    /**
     * Process to unapprove a comment
     * @return bool
     */
    public function unapprove()
    {
        $this->attributes['status'] = self::statusUnapproved;
        return $this->save();
    }

    /**
     * Setter: text
     * @param string $value
     */
    public function setTextAttribute($value)
    {
        $allowedTags = Config::get('laravel-commentary::config.allowed_tags', '');
        $this->attributes['text'] = strip_tags($value, $allowedTags);
    }

}
