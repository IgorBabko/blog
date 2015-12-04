@if($comments->count() !== 0)
    <!-- <h5 class="page-number"> Page {{ $comments->currentPage() }} of {{ $comments->lastPage() }} </h5> -->
    <ul class="items-list">
        @foreach ($comments as $comment)
        <li>
            <div class="item-meta-info">
                <em class="posted-date">posted date: {{ $comment->published_at->format('M jS Y g:ia') }}</em>
            </div>
            <div class="comment">
                {{ $comment->content }}
            </div>
        </li>
        @endforeach
    </ul>
    <div class="pagination-block">
        @include('pagination.limit_links', ['paginator' => $comments])
    </div>
@else
    No comments
@endif
