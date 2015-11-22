<h5 class="page-number"> Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }} </h5>
<ul class="items-list">
    @foreach ($posts as $post)
    <li>
        <img class="post-thumbnail" src="{{ $post->thumbnail }}" alt="post_thumbnail">
        <div class="item-meta-info">
            <em class="comment-amount">comments: 5</em> |
            <em class="posted-date">posted date: {{ $post->published_at->format('M jS Y g:ia') }}</em>
        </div>
        <a href="/post/{{ $post->id }}" class="clickable"> {{ $post->title }} </a>

    </li>
    @endforeach
</ul>
<div class="my-pagination">
    {!! $posts->render() !!}
</div>
