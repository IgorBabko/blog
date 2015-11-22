<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" href="/assets/css/app.css">
		{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
	</head>
	<body>
		@include('partials.header')
		<div id="content">
			@include("sections.about")
			@include("sections.posts")
			@include("sections.questions")
		</div>
		@include('partials.footer')
		<script src="/assets/js/app.js"></script>
		{{-- // <script src="/assets/js/mousewheel.js"></script> --}}
	</body>
</html>
