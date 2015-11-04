<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		@include('partials.styles')
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