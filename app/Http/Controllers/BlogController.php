<?php

namespace Blog\Http\Controllers;

use Blog\Http\Controllers\Controller;
use Blog\Post;
use Blog\Question;

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

        return view('index', compact('posts', 'questions'));
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

        return view('partials.posts-block', compact('posts'));
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

        return view('partials.post-block', compact('post', 'comments'));
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

        return view('partials.comments-block', compact('comments'));
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

        return view('partials.questions-block', compact('questions'));
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

        return view('partials.question-block', compact('question', 'answers'));
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

        return view('partials.answers-block', compact('answers'));
    }

    public function changeCategory($name)
    {
        $category = Category::where('name', '=', $name);
        $posts = $category->posts()
            ->paginate(config('blog.posts_per_page'));

        return view('partials.posts-block', compact('posts'));
    }

    public function search($for, $query)
    {
        $query = '%' . $query . '%';
        $results = [];

        if ($for === 'post') {
            $view = 'partials.posts-block';
            $posts = Post::where('title', 'like', $query)
                ->where('content', 'like', $query)
                ->paginate(config('blog.posts_per_page'));
            $results = ['posts' => $posts];
        } else {
            $view = 'partials.questions-block';
            $questions = Question::where('title', 'like', $query)
                ->where('content', 'like', $query)
                ->paginate(config('blog.posts_per_page'));
            $results = ['questions' => $questions];
        }

        return view($view, $results);
    }
}
