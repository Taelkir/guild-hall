@extends('layouts.app')

@section("content")
<form action="/characters/{{ $character->id }}" method="post">
	@csrf
	@method('PATCH')
	<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">Character name</label>
		<div class="col-md-6">
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
				value="{{ old('name') ?? $character->name }}" required>

			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="race" class="col-md-4 col-form-label text-md-right">Character race</label>
		<div class="col-md-6">
			<input id="race" type="text" class="form-control @error('race') is-invalid @enderror" name="race"
				value="{{ old('race') ?? $character->race }}" required>

			@error('race')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="gender" class="col-md-4 col-form-label text-md-right">Character gender</label>
		<div class="col-md-6">
			<input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender"
				value="{{ old('gender') ?? $character->gender }}" required>

			@error('gender')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="description" class="col-md-4 col-form-label text-md-right">Character description</label>
		<div class="col-md-6">
			<textarea id="description" class="form-control @error('description') is-invalid @enderror"
				name="description">{{ old('description') ?? $character->description }}</textarea>

			@error('description')
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
