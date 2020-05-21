<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $guarded = [];

	public function admin()
	{
		return $this->belongsTo('App\User', "created_by_user");
	}

	public function characters()
	{
		return $this->belongsToMany("App\Character", "characters_rooms")->withTimestamps();
	}

	public function messagess()
	{
		return $this->hasMany("App\ChatMessage", "said_in");
	}

	public function usersWithAccess()
	{
		return $this->belongsToMany("App\User", "users_rooms", "room_id", "user_id")->withTimestamps();
	}
}
