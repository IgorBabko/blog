<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $dates = ['published_at'];

    protected $fillable = [
        'title', 'content', 'published_at',
    ];

    /**
     * The one-to-many relationship between question and answer.
     *
     * @return HasMany
     */
    public function answers()
    {
        return $this->hasMany('Blog\Answer');
    }
}
