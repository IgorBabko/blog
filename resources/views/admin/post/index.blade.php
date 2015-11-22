<section id="posts-section" class="container-fluid section-content">
	<h1 class="section-title">Posts</h1>
	<div class="section-content">
		<a href="/admin/post/create" class="button new-button" id="new-post-button">New</a>
		<button type="button" class="button delete-button" id="delete-post-button" data-toggle="modal" data-target="#modal-delete">Delete</button>
		<a href="/admin/post/create" class="button edit-button" id="edit-post-link">Edit</a>
		<div class="row">
			<div class="col-sm-12">
				@include('admin.partials.errors')
				@include('admin.partials.success')
				<table id="posts-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> Published </th>
							<th> Title </th>
							<th> Subtitle </th>
							<th data-sortable="false"> Actions </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($posts as $post)
						<tr>
							<td data-order="{{ $post->published_at->timestamp }}">
								{{ $post->published_at->format('j-M-y g:ia') }}
							</td>
							<td> {{ $post->title }} </td>
							<td> {{ $post->subtitle }} </td>
							<td>
								<a href="/admin/post/{{ $post->id }}/edit"
									class="btn btn-xs btn-info">
								<i class="fa fa-edit"></i> Edit</a>
								<a href="/blog/{{ $post->slug }}"
									class="btn btn-xs btn-warning">
									<i class="fa fa-eye"></i> View
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div id="post-area"></div>
	</div>
</section>
