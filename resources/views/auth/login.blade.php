@extends('admin.layout')

@section('content')
	<section id="login-section">
		<h1 class="section-title">Login</h1>
		@include('admin.partials.errors')
		<form id="login-form" method="POST" action="{{ url('/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label>E-Mail Address: </label>
				<input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
			</div>
			<div class="form-group">
				<label>Password: </label>
				<input type="password" class="form-control" name="password">
			</div>
				<label>
					<input type="checkbox" name="remember">Remeber me
				</label>
			<button type="submit" id="login-button" class="button">Login</button>
		</form>
	</section>
@stop
