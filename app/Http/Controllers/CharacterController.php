<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
	/**
	 * Display a list of all of your characters.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$characters = Auth::user()->characters;

		return view("characters.index", ["characters" => $characters]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view("characters.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validated = $request->validate([
			"name" => ["required", "min:3", "max:255"],
			"race" => ["min:3", "max:255"],
			"gender" => ["min:3", "max:255"],
			"description" => "max:100000",
		]);

		$newCharacter = new Character($validated);

		Auth::user()->characters()->save($newCharacter);

		return redirect("characters/" . $newCharacter->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Character  $character
	 * @return \Illuminate\Http\Response
	 */
	public function show(Character $character)
	{
		return view("characters.show", ["character" => $character]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Character  $character
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Character $character)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Character  $character
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Character $character)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Character  $character
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Character $character)
	{
		//
	}
}
