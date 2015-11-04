<?php

namespace Blog\Http\Controllers;

use Blog\Http\Controllers\Controller;
use Blog\Post;
use Carbon\Carbon;

class PagesController extends Controller
{
	public function showIndex() {
		$posts = Post::where('published_at', '<=', Carbon::now())
			->orderBy('published_at', 'desc')
			->paginate(config('blog.posts_per_page'));

		return view('pages.index', compact('posts'));
	}

	public function showBio()
	{
		return view('pages.bio');
	}

	public function showDiscussion()
	{
		return view('pages.ask');
	}

	public function showEmail()
	{
		return view('pages.email');
	}

	public function showPost($slug)
	{
		$post = Post::whereSlug($slug)->firstOrFail();

		return view('pages.post')->withPost($post);
	}
}
