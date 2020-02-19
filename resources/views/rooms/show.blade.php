@extends('layouts.app')

@section('content')
<h1>
	{{ $room->name }}
</h1>

<p>
	{{ $room->description }}
</p>

@if($room->admin->id === auth()->user()->id)
<nav>
	<ul>
		<li>
			<a href="/rooms/{{ $room->id }}/edit">Edit this room</a>
		</li>
	</ul>
</nav>
@endif
<h2>Characters in this room</h2>
<ul>
	@foreach ($room->characters as $character)
	<li>
		<a href="/characters/{{ $character->id }}">
			{{ $character->summary() }}
		</a>
	</li>
	@endforeach
</ul>

<h2>Users with access to this room</h2>
<ul>
	@foreach ($room->usersWithAccess as $user)
	<li>{{ $user->username }}</li>
	@endforeach
</ul>

@endsection
