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
<textarea id="answer-textarea"></textarea>
<div id="answers-block">
    @include('blog.partials.answers-block')
</div>
