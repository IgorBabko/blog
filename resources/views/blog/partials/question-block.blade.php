<div class="question" id="{{ $question->id }}">
    <div class="item-text">
        <h2 class="item-title"> {{ $question->title }} </h2>
        {!! nl2br(e($question->content)) !!}
        <div id="question-meta-info">
            <em id="comment-amount">answers: 5</em> |
            <em id="posted-date">posted date: {{ $question->published_at->format('M jS Y g:ia') }} </em>
        </div>
    </div>
</div>
<form id="answer-form">
    <div class="form-group">
        <label for="comment">Your answer:</label>
        <textarea rows="7" class="form-control" id="answer" name="answer">{{ old('answer') }}</textarea>
    </div>
    <button type="submit" class="btn button">Answer</button>
</form>
<div id="answers-block">
    @include('blog.partials.answers-block')
</div>
