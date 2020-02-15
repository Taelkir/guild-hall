<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
	/**
	 * Display a listing of all rooms on the site.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$rooms = Room::all();
		return view("rooms.index", ["rooms" => $rooms]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view("rooms.create");
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
			"description" => "max:100000",
		]);

		$userId = Auth::user()->id;

		$validated['created_by_user'] = $userId;

		$newRoom = new Room($validated);

		if ($newRoom->save()) {
			$newRoom->usersWithAccess()->attach($userId);
		}


		return redirect("rooms/" . $newRoom->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Room  $room
	 * @return \Illuminate\Http\Response
	 */
	public function show(Room $room)
	{
		return view("rooms.show", ["room" => $room]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Room  $room
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Room $room)
	{
		return view("rooms.edit", ["room" => $room]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Room  $room
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Room $room)
	{
		$request->validate([
			"name" => ["required", "min:3", "max:255"],
			"description" => "max:100000",
		]);

		$room->name = $request->name;
		$room->description = $request->description;
		$room->private = $request->has('private');
		$room->save();

		$request->session()->flash('message', 'Successfully updated room!');
		return redirect("rooms/" . $room->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Room  $room
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Room $room)
	{
		$room->delete();
		Session::flash('message', "Successfully deleted character $room->name!");
		return redirect("rooms/");
	}
}
