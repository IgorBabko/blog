<a href="/email" id="email-link" class="nav-link @if (Request::is('email')) active-link @endif">
	<span class="glyphicon glyphicon-envelope"></span>
</a>
<span>email</span>
<a href="/ask" id="ask-link" class="nav-link @if (Request::is('ask')) active-link @endif">
	<span class="glyphicon glyphicon-question-sign"></span>
</a>
<span>ask</span>
<a href="/posts" id="posts-link" class="nav-link @if (Request::is('posts')) active-link @endif">
	<span class="glyphicon glyphicon-list-alt"></span>
</a>
<span>posts</span>
<a href="/bio" id="bio-link" class="nav-link @if (Request::is('bio')) active-link @endif">
	<span class="glyphicon glyphicon-user"></span>
</a>
<span>bio</span>