<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $dates = ['published_at'];

    protected $fillable = [
        'question_id', 'content', 'published_at',
    ];

    /**
     * The one-to-many relationship between question and answers.
     *
     * @return BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('Blog\Question');
    }
}
