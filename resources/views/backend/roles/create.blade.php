@extends('master')
@section('title', 'Create A New Role')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well bs-component">
			<form method="post" class="form-horizontal">
				@foreach ($errors->all() as $error)
					<p class="alert alert-danger">{{ $error }}</p>
				@endforeach

				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif

				{!! csrf_field() !!}

				<fieldset>
					<legend>Create a new role</legend>

					<div class="form-group">
						<label for="name" class="col-lg-2 control-label">Name</label>

						<div class="col-lg-10">
							<input type="text" name="name" id="name" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="reset" class="btn btn-default">Cancel</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection