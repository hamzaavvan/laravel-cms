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
						{{ session('status') }}
					</div>
				@endif

				<fieldset>
					<legend>Edit Ticket</legend>
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">
							<strong>Title</strong>
						</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" value="{!! $ticket->title !!}" name="title" id="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label for="content" class="col-lg-2 control-label">
							<strong>Content</strong>
						</label>
						<div class="col-lg-10">
							<textarea class="form-control" name="content" rows="3" id="content">{!! $ticket->content !!}</textarea>
							<span class="help-block">Feel free to ask us any question.</span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<p><strong>Status</strong>: {!! $ticket->status ? '<span class="label inline-block label-warning">Pending</span>' : '<span inline-block class="label label-success">Answered</span>' !!}</p>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<label>
								<input type="checkbox" name="status" {!! $ticket->status?"":"checked"!!} > Close this ticket?
							</label>
						</div>
					</div>


					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<a href="{!! action("TicketsController@show", $ticket->slug) !!}" class="btn btn-default">Cancel</a>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection