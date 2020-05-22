<?php

namespace App\Http\Controllers;

use App\ChatMessage;
use App\Room;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the messages in the given room.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($roomId)
	{
		$room = Room::findOrFail($roomId);

		return response()->json($room->messages);
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
			"body" => "max:100000", // message text
			"said_by" => "required|number", // character id
			"said_in" => "required|number", // room id
		]);

		$room = Room::findOrFail($validated['said_in']);

		$room->messages()->create($validated);

		return ['status' => 'Message Sent!'];
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\ChatMessage  $chatMessage
	 * @return \Illuminate\Http\Response
	 */
	public function show(ChatMessage $chatMessage)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ChatMessage  $chatMessage
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, ChatMessage $chatMessage)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ChatMessage  $chatMessage
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ChatMessage $chatMessage)
	{
		//
	}
}
