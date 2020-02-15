@extends('layouts.app')

@section("content")
<h1>All rooms</h1>
<nav>
	<ul>
		<li>
			<a href="/rooms/create">New room</a>
		</li>
	</ul>
</nav>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Description</th>
			<th scope="col">Private?</th>
			<th scope="col">Created by</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($rooms as $room)
		<tr>
			<th scope="row">{{ $room->name }}</td>
			<td>{{ $room->description }}</td>
			<td>{{ $room->private }}</td>
			<td>{{ $room->admin['email'] }}</td>
			<td>
				<a href="rooms/{{ $room->id }}" class="btn btn-link">
					View
				</a>
				<form action="/rooms/{{$room->id}}" method="POST">
					@csrf
					@method("DELETE")
					<button type="submit" class="btn btn-link">
						Delete room
					</button>
				</form>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
