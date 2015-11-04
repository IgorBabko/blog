@extends("layout")

@section('content')
	<h1 id="page-title">My posts</h1>
	<article>
		<h2 id="post-title"> {{ $post->title }} </h2>
		{!! nl2br(e($post->content)) !!}
	</article>
	<div id="post-meta-info">
		<em id="comment-amount">comments: {{ $post->commentNumber }}</em> | 
		<em id="post-date">posted date: {{ $post->published_at->format('M jS Y g:ia') }} </em>
	</div>
	<button class="button" onclick="history.go(-1)">
		&laquo; Back
	</button>
@stop