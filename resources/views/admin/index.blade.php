<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" href="/assets/css/app.css">
		{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
	</head>
	<body>
		@include('admin.partials.header')
		<div id="content">
			@include("admin.post.index")
			@include("admin.tag.index")
			@include("admin.upload.index")
		</div>
		<script src="/assets/js/app.js"></script>
		<script>
			$(function() {
				$("#posts-table").DataTable({
					order: [[0, "desc"]]
				});
			});

			$(function() {
				$("#tags-table").DataTable({});
			});

			// Confirm file delete
			function delete_file(name) {
				$("#delete-file-name1").html(name);
				$("#delete-file-name2").val(name);
				$("#modal-file-delete").modal("show");
			}
			// Confirm folder delete
			function delete_folder(name) {
				$("#delete-folder-name1").html(name);
				$("#delete-folder-name2").val(name);
				$("#modal-folder-delete").modal("show");
			}
			// Preview image
			function preview_image(path) {
				$("#preview-image").attr("src", path);
				$("#modal-image-view").modal("show");
			}
			// Startup code
			$(function() {
				$("#uploads-table").DataTable();
			});

			// create post
			$(function() {
				$("#publish_date").pickadate({
					format: "mmm-d-yyyy"
				});
				$("#publish_time").pickatime({
					format: "h:i A"
				});
				$("#tags").selectize({
					create: true
				});
			});
	</script>
	<script src="/assets/js/picker.js"></script>
	<script src="/assets/js/picker.date.js"></script>
	<script src="/assets/js/picker.time.js"></script>
	<script src="/assets/js/selectize.min.js"></script>
	</body>
</html>
