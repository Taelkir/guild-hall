@extends('layouts.app')

@section('content')
<h1>
	{{ $character->name }}
</h1>

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
