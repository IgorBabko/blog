<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/assets/css/app.css">
		{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
	</head>
	<body>
		@include("blog.partials.header")
		<div id="content">
			@include("blog.sections.bio")
			@include("blog.sections.contact")
			@include("blog.sections.posts")
			@include("blog.sections.questions")
		</div>
		@include("blog.partials.footer")
		<script src="/assets/js/app.js"></script>
		{{-- // <script src="/assets/js/mousewheel.js"></script> --}}
	</body>
</html>
