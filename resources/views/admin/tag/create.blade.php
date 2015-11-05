@extends('admin.layout')

@section('content')
	<h2>Create New Tag</h2>
	@include('admin.partials.errors')
	<form method="POST" action="/admin/tag">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="tag"> Tag </label>
			<input type="text" class="form-control" name="tag" id="tag" value="{{ $tag }}" autofocus>
		</div>
		@include('admin.tag._form')
		<button type="submit" class="button" id="create-tag-button">Create</button>
	</form>
@stop