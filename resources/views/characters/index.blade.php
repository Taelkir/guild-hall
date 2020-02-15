@extends('layouts.app')

@section('content')
<h1>Your characters</h1>
<nav>
	<ul>
		<li>
			<a href="/characters/create">New character</a>
		</li>
	</ul>
</nav>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Race</th>
			<th scope="col">Gender</th>
			<th scope="col">Description</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($characters as $character)
		<tr>
			<th scope="row">{{$character->name}}</td>
			<td>{{$character->race}}</td>
			<td>{{$character->gender}}</td>
			<td>{{$character->description}}</td>
			<td>
				<a href="characters/{{$character->id}}/edit" class="btn btn-link">
					Edit character
				</a>
				<form action="/characters/{{$character->id}}" method="POST">
					@csrf
					@method("DELETE")
					<button type="submit" class="btn btn-link">
						Delete character
					</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
