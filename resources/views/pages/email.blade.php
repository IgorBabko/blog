@extends("layout")

@section('content')
	<h1 id="page-title">Email me</h1>
	<form id="email-form">
		<div>
			<div class="form-group">
				<label for="exampleInputEmail1">Name:</label>
				<input type="text" class="form-control" id="exampleInputEmail1">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Email:</label>
				<input type="email" class="form-control" id="exampleInputPassword1">
			</div>
		</div>
		<div class="form-group">
			<label>Text:</label>
			<textarea id="email-textarea" class="form-control"></textarea>
		</div>
		<button type="submit" id="submit-email-button" class="button">Submit</button>
	</form>
@stop