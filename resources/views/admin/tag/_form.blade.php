<div class="form-group">
	<label for="title">Title</label>
	<input type="text" class="form-control" name="title" id="title" value="{{ $title }}">
</div>
<div class="form-group">
	<label for="subtitle">Subtitle</label>
	<input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $subtitle }}">
</div>
<div class="form-group">
	<label for="meta_description">Meta Description</label>
	<textarea class="form-control" id="meta_description" name="meta_description" rows="3">
		{{ $meta_description }}
	</textarea>
</div>
<div class="form-group">
	<label for="page_image">Page Image</label>
	<input type="text" class="form-control" name="page_image" id="page_image" value="{{ $page_image }}">
</div>
<div class="form-group">
	<label for="layout">Layout</label>
	<input type="text" class="form-control" name="layout" id="layout" value="{{ $layout }}">
</div>
<div class="form-group">
	<label for="reverse_direction">Direction</label>
	<label>
		<input type="radio" name="reverse_direction" id="reverse_direction"
		@if (! $reverse_direction)
			checked="checked"
		@endif
		value="0">
		Normal
	</label>
	<label>
		<input type="radio" name="reverse_direction"
		@if ($reverse_direction)
			checked="checked"
		@endif
		value="1">
		Reversed
	</label>
</div>