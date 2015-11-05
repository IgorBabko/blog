<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" href="/assets/css/app.css">
		@if ( Config::get('app.debug') )
			<script type="text/javascript">
				document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
			</script> 
		@endif
	</head>
	<body>
		<header>
			@include('partials.header')
		</header>
		<div id="content">
			@yield('content')
		</div>
		<script src="/assets/js/app.js"></script>
	</body>
</html>