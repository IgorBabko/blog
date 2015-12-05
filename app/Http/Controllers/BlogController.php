<?php

namespace Blog\Http\Controllers;

use Blog\Category;
use Blog\Http\Controllers\Controller;
use Blog\Post;
use Blog\Question;
use Blog\Comment;
use Blog\Services\RssFeed;
use Blog\Services\SiteMap;
use Blog\Http\Requests\CommentCreateRequest;
use Blog\Http\Requests\AddQuestionRequest;
use Blog\Http\Requests\AddAnswerRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showPost($id, Request $request)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments()->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        $request->session()->put('current_post_id', $id);

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
     * Add comment
     *
     * @param  AddCommentRequest
     * @return \Illuminate\Http\Response
     */
    public function addComment(CommentCreateRequest $request)
    {
        $comment = Comment::create([
            'post_id' => $request->session()->get('current_post_id'),
            'content' => $request->get('comment'),
            'published_at' => Carbon::now()
        ]);

        return response()->json($comment->toJson());
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
