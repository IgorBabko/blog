<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		@include('partials.styles')
		<link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
			@include('partials.header')
		</header>
		<div id="content">
			@yield('content')
		</div>
		@include('partials.scripts')
	</body>
</html>