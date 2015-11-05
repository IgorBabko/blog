@extends('admin.layout')

@section('content')
	<h2 style="text-align: center">Edit Tag</h3>
	@include('admin.partials.errors')
	@include('admin.partials.success')
	<form method="POST" action="/admin/tag/{{ $id }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="id" value="{{ $id }}">

		@include('admin.tag._form')
		<div class="form-group">
			<button type="submit" class="button" id="edit-tag-button">Edit</button>
		</div>
	</form>
@stop