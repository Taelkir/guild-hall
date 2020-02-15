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
}
