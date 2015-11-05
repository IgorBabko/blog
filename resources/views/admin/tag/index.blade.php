@extends('admin.layout')

@section('content')
	<div class="container-fluid">
		<a href="/admin/tag/create" class="button" id="new-tag-button">New</a>
		<button type="button" class="button" id="delete-tag-button" data-toggle="modal" data-target="#modal-delete">Delete</button>
		<a href="/admin/tag/create" class="button" id="edit-tag-link">Edit</a>
		<div class="row">
			<div class="col-sm-12">
				@include('admin.partials.errors')
				@include('admin.partials.success')
				<table id="tags-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> Tag </th>
							<th> Title </th>
							<th class="hidden-sm"> Subtitle </th>
							<th class="hidden-md"> Page Image </th>
							<th class="hidden-md"> Meta Description </th>
							<th class="hidden-md"> Layout </th>
							<th class="hidden-sm"> Direction </th>
							<th data-sortable="false"> Actions </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tags as $tag)
							<tr>
								<td> {{ $tag->tag }} </td>
								<td> {{ $tag->title }} </td>
								<td class="hidden-sm"> {{ $tag->subtitle }} </td>
								<td class="hidden-md"> {{ $tag->page_image }} </td>
								<td class="hidden-md"> {{ $tag->meta_description }} </td>
								<td class="hidden-md"> {{ $tag->layout }} </td>
								<td class="hidden-sm">
									@if ($tag->reverse_direction)
										Reverse
									@else
										Normal
									@endif
								</td>
								<td>
									<a href="/admin/tag/{{ $tag->id }}/edit"
									class="btn btn-xs btn-info">
										<i class="fa fa-edit"></i> Edit
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{-- Confirm Delete --}}
	<div class="modal fade" id="modal-delete" tabIndex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title"> Please Confirm </h4>
				</div>
				<div class="modal-body">
					<p class="lead">
						<i class="fa fa-question-circle fa-lg"></i> &nbsp;
						Are you sure you want to delete this tag?
					</p>
				</div>
				<div class="modal-footer">
					<form method="POST" action="/admin/tag/">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="DELETE">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-times-circle"></i> Yes
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop

@section("scripts")
	<script>
		$(function() {
			$("#tags-table").DataTable({});
		});
	</script>
@stop