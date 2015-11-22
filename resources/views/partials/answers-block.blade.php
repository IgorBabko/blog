<h5 class="page-number"> Page {{ $answers->currentPage() }} of {{ $answers->lastPage() }} </h5>
<ul class="items-list">
    @foreach ($answers as $answer)
    <li>
        <div class="item-meta-info">
            <em class="posted-date">posted date: {{ $answer->published_at->format('M jS Y g:ia') }}</em>
        </div>
        {{ $answer->content }}
    </li>
    @endforeach
</ul>
<div class="my-pagination">
    {!! $answers->render() !!}
</div>
