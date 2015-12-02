<section id="posts-section">
	<h1 class="section-title">Comments</h1>
	<div class="section-content">
        <div id="comments-block">
            <form id="comment-form">
        		<div class="form-group">
        			<textarea rows="7" class="form-control" name="comment" placeholder="Your opinion:"> {{ old('comment') }} </textarea>
        		</div>
        		<button type="submit" class="btn" id="ask-question-button">Ask</button>
        	</form>
            @include('blog.partials.comments-block')
        </div>
    </div>
</section>
