<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
	public function character()
	{
		return $this->belongsTo('App\Character');
	}
	public function room()
	{
		return $this->belongsTo('App\Room');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
