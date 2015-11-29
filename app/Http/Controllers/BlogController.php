<?php

namespace Blog\Http\Controllers;

use Blog\Category;
use Blog\Http\Controllers\Controller;
use Blog\Post;
use Blog\Question;
use Blog\Services\RssFeed;
use Blog\Services\SiteMap;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::
            // ->orderBy('published_at', 'desc')
            paginate(config('blog.posts_per_page'));

        $questions = Question::
            // ->orderBy('published_at', 'desc')
            paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts', 'questions'));
    }

    /**
     * Display the posts list.
     *
     * @param  int  $pageId
     * @return \Illuminate\Http\Response
     */
    public function showPosts()
    {
        $posts = Post::
            // ->orderBy('published_at', 'desc')
            paginate(config('blog.posts_per_page'));

        return view('blog.partials.posts-block', compact('posts'));
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments()
            ->paginate(config('blog.posts_per_page'));

        return view('blog.partials.post-block', compact('post', 'comments'));
    }

    /**
     * Show comments for specified post.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function showComments($postId)
    {
        $post = Post::findOrFail($postId);

        $comments = $post->comments()
            ->paginate(config('blog.posts_per_page'));

        return view('blog.partials.comments-block', compact('comments'));
    }

    /**
     * Display the questions list.
     *
     * @param  int  $pageId
     * @return \Illuminate\Http\Response
     */
    public function showQuestions()
    {
        $questions = Question::
            // ->orderBy('published_at', 'desc')
            paginate(config('blog.posts_per_page'));

        return view('blog.partials.questions-block', compact('questions'));
    }

    /**
     * Display the specified question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQuestion($id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answers()
            ->paginate(config('blog.posts_per_page'));

        return view('blog.partials.question-block', compact('question', 'answers'));
    }

    /**
     * Show answers for specified question.
     *
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function showAnswers($questionId)
    {
        $question = Question::findOrFail($questionId);

        $answers = $question->answers()
            ->paginate(config('blog.posts_per_page'));

        return view('blog.partials.answers-block', compact('answers'));
    }

    public function changeCategory($categoryId)
    {
        // echo $categoryId;
        // return '';
        $category = Category::findOrFail($categoryId);
        $posts = $category->posts()
            ->paginate(config('blog.posts_per_page'));

        return view('blog.partials.posts-block', compact('posts'));
    }

    public function search($for, $query)
    {
        $query = '%' . $query . '%';
        $results = [];

        if ($for === 'post') {
            $view = 'blog.partials.posts-block';
            $posts = Post::where('title', 'like', $query)
                ->where('content', 'like', $query)
                ->paginate(config('blog.posts_per_page'));
            $results = ['posts' => $posts];
        } else {
            $view = 'blog.partials.questions-block';
            $questions = Question::where('title', 'like', $query)
                ->where('content', 'like', $query)
                ->paginate(config('blog.posts_per_page'));
            $results = ['questions' => $questions];
        }

        return view($view, $results);
    }

    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();
        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }

    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();
        return response($map)
            ->header('Content-type', 'text/xml');
    }
}
