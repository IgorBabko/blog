<div class="nav-item-block">
	<span class="nav-item-label">exit</span>
	<a href="/" class="nav-item-link">
		<span class="glyphicon glyphicon-envelope nav-item-icon"></span>
	</a>
</div>
<div class="nav-item-block">
	<span class="nav-item-label">uploads</span>
	<a href="/admin/upload" class="nav-item-link @if (Request::is('admin/upload*')) active-link @endif">
		<span class="glyphicon glyphicon-envelope nav-item-icon"></span>
	</a>
</div>
<div class="nav-item-block">
	<span class="nav-item-label">tags</span>
	<a href="/admin/tag" class="nav-item-link @if (Request::is('admin/tag*')) active-link @endif">
		<span class="glyphicon glyphicon-question-sign nav-item-icon"></span>
	</a>
</div>
<div class="nav-item-block">
	<span class="nav-item-label">posts</span>
	<a href="/admin/post" class="nav-item-link @if (Request::is('/admin/post*')) active-link @endif">
		<span class="glyphicon glyphicon-list-alt nav-item-icon"></span>
	</a>
</div>
{{-- <ul class="nav navbar-nav">
	<li>
		<a href="/"> Blog Home </a>
	</li>
	@if (Auth::check())
		<li @if (Request::is('admin/post*')) class="active" @endif>
			<a href="/admin/post"> Posts </a>
		</li>
		<li @if (Request::is('admin/tag*')) class="active" @endif>
			<a href="/admin/tag"> Tags </a>
		</li>
		<li @if (Request::is('admin/upload*')) class="active" @endif>
			<a href="/admin/upload"> Uploads </a>
		</li>
	@endif
</ul>
<ul class="nav navbar-nav navbar-right">
	@if (Auth::guest())
		<li>
			<a href="/auth/login"> Login </a>
		</li>
	@else
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="/auth/logout"> Logout </a>
				</li>
			</ul>
		</li>
	@endif
</ul> --}}