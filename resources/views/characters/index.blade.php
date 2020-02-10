@extends('layouts.app')

@section('content')
<h1>Your characters</h1>
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
			<td><a href="characters/{{$character->id}}/edit">Edit</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
