<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>

	<body>
		<h2>{!! $ticket->title !!}</h2>
		
		<div>
			You have a new ticket. The ticket id is <a href="{!! url('/ticket', [$ticket->slug]) !!}">{!! $ticket->slug !!}</a>

			<p><a href="{!! url('tickets') !!}">View all tickets</a></p>
		</div>
	</body>
</html>