<!DOCTYPE html>
<html>
	<head>
		<title>Blog admin panel</title>
		<link rel="stylesheet" href="/assets/css/app.css">
		@if ( Config::get('app.debug') )
			<script type="text/javascript">
				document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
			</script> 
		@endif
		@yield("styles")
	</head>
	<body>
		<header id="admin-panel-header">
			@include('admin.partials.header')
		</header>
		<div id="content">
			@yield("content")
		</div>
		<script src="/assets/js/app.js"></script>
		@yield("scripts")
	</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> {{ config('blog.title') }} Admin </title>
	<link rel="stylesheet" href="/assets/css/app.css">
	@yield('styles') --}}
	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
{{-- </head>
<body> --}}
	{{-- Navigation Bar --}}
{{-- 	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar-menu">
				<span class="sr-only"> Toggle Navigation </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"> {{ config('blog.title') }} Admin </a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-menu">
				@include('admin.partials.nav')
			</div>
		</div>
	</nav>
	@yield('content')
	<script src="/assets/js/app.js"></script>
	@yield('scripts')
</body>
</html> --}}