<article id="{{ $post->id }}">
    <h2 id="post-title"> {{ $post->title }} </h2>
    {!! nl2br(e($post->content)) !!}
</article>
<div id="post-meta-info">
    <em id="comment-amount">comments: 5</em> |
    <em id="posted-date">posted date: {{ $post->published_at->format('M jS Y g:ia') }} </em>
</div>
<div id="comments-block">
    <form id="comment-form">
		<div class="form-group">
            <label for="comment">Your comment:</label>
			<textarea rows="7" class="form-control" id="comment" name="comment" placeholder="Your opinion:"></textarea>
		</div>
		<button type="submit" class="btn" id="ask-question-button">Ask</button>
	</form>
    @include('blog.partials.comments-block')
</div>
