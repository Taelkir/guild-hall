@extends('layouts.app')

@section('content')
<h1>
	{{ $character->name }}
</h1>

@if($character->user_id === auth()->user()->id)
<nav>
	<ul>
		<li>
			<a href="/characters/{{ $character->id }}/edit">Edit this character</a>
		</li>
	</ul>
</nav>
@endif

<p>
	{{ $character->race }}
</p>
<p>
	{{ $character->gender }}
</p>
<p>
	{{ $character->description }}
</p>

@endsection
