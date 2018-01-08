@extends('master')
@section('title', 'Create Ticket')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
			
			<form class="form-horizontal" method="post">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				
				@foreach($errors->all() as $error)
					<p class="alert alert-danger">{{$error}}</p>
				@endforeach

				@if(session('status'))
					<div class="alert alert-success">
						{!! session('status') !!}
					</div>
				@endif

				<fieldset>
					<legend>Submit a new ticket</legend>
					<p><small>{!! toDate(date("Y-m-d", time())) !!}</small></p>

					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Title</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="title" id="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label for="content" class="col-lg-2 control-label">Content</label>
						<div class="col-lg-10">
							<textarea class="form-control" name="content" rows="3" id="content"></textarea>
							<span class="help-block">Feel free to ask us any question.</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<a href="{!! url('/tickets') !!}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection