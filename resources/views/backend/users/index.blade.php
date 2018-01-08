@extends('master')
@section('title', 'All Users')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>All Users</h2>
			</div>

			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif

			@if ($users->isEmpty())
				<p>There's no user</p>
			@else
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Joined at</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{!! $user->id !!}</td>
								<td>
									@if ($user->hasRole('manager') && $user->id != auth()->user()->id)
										<span>{!! $user->name !!}</span>
									@else
										<a href="{!! action('Admin\UserController@edit', $user->id) !!}">{!! $user->name !!}</a>
									@endif
								</td>
								<td>{!! $user->email !!}</td>
								<td>

									<span class="badge badge-default">{!! !empty($user->getRoleNames()[0]) ? $user->getRoleNames()[0] : "member" !!}</span>
								</td>
								<td>{!! $user->created_at !!}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
@endsection