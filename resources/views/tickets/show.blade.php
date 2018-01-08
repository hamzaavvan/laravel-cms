@extends('master')
@section('title', 'View Ticket')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		
		<div class="well bs-component">
			<div class="content">
				<h2 class="header">{!! $ticket->title !!}</h2>
				<p><small>{!! toDate($ticket->created_at) !!}</small></p>
				<p><strong>Status</strong>: {!! $ticket->status ? '<span class="label inline-block label-warning">Pending</span>' : '<span inline-block class="label label-success">Answered</span>' !!}</p>
				
				<?php
					$url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
					$string = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $ticket->content);
				 ?>

				<p>{!! nl2br($string) !!}</p>
			</div>

			<a href="{!! action("TicketsController@edit", $ticket->slug) !!}" class="btn btn-info pull-left">Edit</a>
			
			<form method="post" action="{!! action('TicketsController@destroy', $ticket->slug) !!}" class="pull-left">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div>
					<button type="submit" class="btn btn-warning">Delete</button>
				</div>
			</form>

			<div class="clearfix"></div>
		</div>

		@foreach($comments as $comment)
			<div class="well well bs-component">
				<div class="content">
					<p>{!! $comment->content !!}</p>
					<small>{!! toDate($comment->created_at) !!}</small>
				</div>
			</div>
		@endforeach

		<div class="well well bs-component">

			<form class="form-horizontal" method="post" action="/comment">
				@foreach($errors->all() as $error)
					<p class="alert alert-danger">{{ $error }}</p>
				@endforeach

				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<input type="hidden" name="post_id" value="{!! $ticket->id !!}">
				
				<fieldset>
					<legend>Reply</legend>
					<div class="form-group">
						<div class="col-lg-12">
							<textarea class="form-control" rows="3" id="content" name="content"></textarea>
							<span class="help-block">Post a comment.</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Post</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>

	</div>
@endsection