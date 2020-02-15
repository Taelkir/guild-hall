@extends('layouts.app')

@section("content")
<form action="/rooms/{{ $room->id }}" method="post">
	@csrf
	@method('PATCH')
	<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">Room name</label>
		<div class="col-md-6">
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
				value="{{ old('name') ?? $room->name }}" required>

			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="form-group row">
		<label for="description" class="col-md-4 col-form-label text-md-right">Room description</label>
		<div class="col-md-6">
			<textarea id="description" class="form-control @error('description') is-invalid @enderror"
				name="description">{{ old('description') ?? $room->description }}</textarea>

			@error('description')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="private" class="col-md-4 col-form-label text-md-right form-check-label">Private?</label>
		<div class="col-md-6">
			<input id="private" type="checkbox"
				class="form-control form-check-input @error('private') is-invalid @enderror" name="private"
				{{ $room->private ? "checked" : ""}}>
			@error('private')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-4"></div>
		<div class="col-md-6">
			<button type="submit" class="btn btn-primary">Submit changes</button>
		</div>
	</div>
</form>
@endsection
