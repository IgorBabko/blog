<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * The one-to-many relationship between category and posts.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('Blog\Post');
    }
}
