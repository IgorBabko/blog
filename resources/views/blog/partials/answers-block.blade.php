@if($answers->count() !== 0)
    <!-- <h5 class="page-number"> Page {{ $answers->currentPage() }} of {{ $answers->lastPage() }} </h5> -->
    <ul class="items-list">
        @foreach ($answers as $answer)
        <li>
            <div class="item-meta-info">
                <em class="posted-date">posted date: {{ $answer->published_at->format('M jS Y g:ia') }}</em>
            </div>
            <div class="answer">
                {{ $answer->content }}
            </div>
        </li>
        @endforeach
    </ul>
    <div class="pagination-block">
        @include('pagination.limit_links', ['paginator' => $answers])
    </div>
@else
    No answers
@endif
