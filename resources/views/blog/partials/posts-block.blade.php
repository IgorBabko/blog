@if($posts->count() !== 0)
    <h5 class="page-number"> Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }} </h5>
    <ul class="items-list">
        @foreach ($posts as $post)
        <li>
            <a href="/post/{{ $post->id }}" class="clickable">
                <!-- <img class="post-thumbnail" src="{{ $post->thumbnail }}" alt="post_thumbnail"> -->
                <div class="item-meta-info">
                    <em class="comment-amount">comments: 5</em> |
                    <em class="posted-date">posted date: {{ $post->published_at->format('M jS Y g:ia') }}</em>
                </div>
                <div class="item-info">
                    <h3>{{ $post->title }}</h3>
                    <div>
                        {{ str_limit($post->content, 300) }}
                    </div>
                </div>
            </a>

        </li>
        @endforeach
    </ul>
    <!-- {!! $posts->render() !!} -->
    <div class="pagination-block">
        @include('pagination.limit_links', ['paginator' => $posts])
    </div>
@endif
