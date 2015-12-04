<article id="{{ $post->id }}">
    <div class="item-text">
        <h2 class="item-title"> {{ $post->title }} </h2>
        {!! nl2br(e($post->content)) !!}
        <div id="post-meta-info">
            <em id="comment-amount">comments: 5</em> |
            <em id="posted-date">posted date: {{ $post->published_at->format('M jS Y g:ia') }} </em>
        </div>
    </div>
    <div id="comments-block">
        <form id="comment-form">
    		<div class="form-group">
                <label for="comment">Your opinion:</label>
    			<textarea rows="7" class="form-control" id="comment" name="comment"></textarea>
    		</div>
    		<button type="submit" class="btn button">Ask</button>
    	</form>
        @include('blog.partials.comments-block')
    </div>
</article>
