<div class="nav-item-block">
	<span class="nav-item-label">email</span>
	<a href="/email" class="nav-item-link @if (Request::is('email')) active-link @endif">
		<span class="glyphicon glyphicon-envelope nav-item-icon"></span>
	</a>
</div>
<div class="nav-item-block">
	<span class="nav-item-label">ask</span>
	<a href="/ask" class="nav-item-link @if (Request::is('ask')) active-link @endif">
		<span class="glyphicon glyphicon-question-sign nav-item-icon"></span>
	</a>
</div>
<div class="nav-item-block">
	<span class="nav-item-label">posts</span>
	<a href="/posts" class="nav-item-link @if (Request::is('posts')) active-link @endif">
		<span class="glyphicon glyphicon-list-alt nav-item-icon"></span>
	</a>
</div>
<div class="nav-item-block">
	<span class="nav-item-label">bio</span>
	<a href="/bio" class="nav-item-link @if (Request::is('bio')) active-link @endif">
		<span class="glyphicon glyphicon-user nav-item-icon"></span>
	</a>
</div>
