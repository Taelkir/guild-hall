<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function rooms()
	{
		return $this->belongsToMany("App\Room", "characters_rooms")->withTimestamps();
	}

	public function messages()
	{
		return $this->hasMany("App\ChatMessage", "said_by");
	}

	public function summary()
	{
		return "$this->name, $this->gender $this->race";
	}
}
