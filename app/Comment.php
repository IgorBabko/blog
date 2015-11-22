<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $dates = ['published_at'];

    protected $fillable = [
        'post_id', 'content', 'published_at',
    ];

    /**
     * The one-to-many relationship between post and comment.
     *
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('Blog\Post');
    }
}
