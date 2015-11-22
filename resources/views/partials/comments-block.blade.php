<h5 class="page-number"> Page {{ $comments->currentPage() }} of {{ $comments->lastPage() }} </h5>
<ul class="items-list">
    @foreach ($comments as $comment)
    <li>
        <div class="item-meta-info">
            <em class="posted-date">posted date: {{ $comment->published_at->format('M jS Y g:ia') }}</em>
        </div>
        {{ $comment->content }}
    </li>
    @endforeach
</ul>
<div class="my-pagination">
    {!! $comments->render() !!}
</div>
