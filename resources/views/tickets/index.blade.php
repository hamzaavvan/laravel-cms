@extends('master')
@section('title', 'View all tickets')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="{!! url("tickets/create") !!}" class="btn btn-success float-right create-ticket">
					<i class="glyphicon glyphicon-plus"></i>
				</a>

				<h2 style="margin-top: 10px">Tickets</h2>

				@if(session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
			</div>

			@if($tickets->isEmpty())
				<p style="margin: 15px">There is no ticket.</p>
			@else
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Status</th>
						</tr>
					</thead>

					<tbody>
						@foreach($tickets as $ticket)
							<tr>
								<td>{!! $ticket->id !!}</td>
								<td>
									<a href="{!! action("TicketsController@show", $ticket->slug) !!}">{!! $ticket->title !!}</a>
								</td>
								<td>
									{!! $ticket->status ? '<span class="label inline-block label-warning">Pending</span>' : '<span class="label inline-block label-success">Answered</span>' !!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
@endsection