<article id="{{ $post->id }}">
    <h2 id="post-title"> {{ $post->title }} </h2>
    {!! nl2br(e($post->content_html)) !!}
</article>
<div id="post-meta-info">
    <em id="comment-amount">comments: 5</em> |
    <em id="posted-date">posted date: {{ $post->published_at->format('M jS Y g:ia') }} </em>
</div>
<div id="comments-block">
    @include('partials.comments-block')
</div>
