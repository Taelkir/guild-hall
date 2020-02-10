@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Dashboard</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					You are logged in! Next:

					<nav>
						<li><a href="/characters">View your characters</a></li>
						<li><a href="/rooms">View all rooms (not yet)</a></li>
					</nav>
					<a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
