@extends('layouts.app')

@section('content')
<h1>
	{{ $room->name }}
</h1>

<p>
	{{ $room->description }}
</p>

<style>
	.chat {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.chat li {
		margin-bottom: 10px;
		padding-bottom: 5px;
		border-bottom: 1px dotted #B3A9A9;
	}

	.chat li .chat-body p {
		margin: 0;
		color: #777777;
	}

	.panel-body {
		overflow-y: scroll;
		height: 350px;
	}

	::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
		background-color: #F5F5F5;
	}

	::-webkit-scrollbar {
		width: 12px;
		background-color: #F5F5F5;
	}

	::-webkit-scrollbar-thumb {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
		background-color: #555;
	}
</style>

<script>
	window.roomId = "{{ $room->id }}";
</script>
<div class="chat-wrapper" id="chatWrapper"></div>

<hr>

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
