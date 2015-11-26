@if($questions->count() !== 0)
    <h5 class="page-number"> Page {{ $questions->currentPage() }} of {{ $questions->lastPage() }} </h5>
    <ul class="items-list">
        @foreach ($questions as $question)
        <li>
            <img class="question-thumbnail" src="{{ $question->thumbnail }}" alt="question_thumbnail">
            <div class="item-meta-info">
                <em class="answer-amount">answers: 5</em> |
                <em class="posted-date">posted date: {{ $question->published_at->format('M jS Y g:ia') }}</em>
            </div>
            <a href="/question/{{ $question->id }}" class="clickable"> {{ $question->title }} </a>

        </li>
        @endforeach
    </ul>
    <div class="my-pagination">
        {!! $questions->render() !!}
    </div>
@endif
