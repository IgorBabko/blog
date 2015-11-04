@extends("layout")

@section('content')
	<h1 id="page-title">My posts</h1>
	<div id="categories">
		<ul id="categories-list">
			<li id="active-category-item">All</li>
			<li>General</li>
			<li>Education</li>
			<li>Programming</li>
		</ul>
	</div>
	<h5 id="page-number"> Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }} </h5>
	<ul id="posts-list">
		@foreach ($posts as $post)
			<li>
				<img class="post-thumbnail" src="{{ $post->thumbnail }}" alt="post_thumbnail">
				<a href="/posts/{{ $post->slug }}"> {{ $post->title }} </a>
				<div class="post-meta-info">
					<em class="comment-amount">comments: {{ $post->commentNumber }}</em> | 
					<em class="post-date"> ({{ $post->published_at->format('M jS Y g:ia') }}) </em>
				</div>
			</li>
		@endforeach
	</ul>
	<div id="pagination">
		{!! $posts->render() !!}
	</div>
@stop