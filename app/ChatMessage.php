<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
	protected $fillable = ["body", "said_in", "said_by"];

	public function character()
	{
		return $this->belongsTo('App\Character');
	}
	public function room()
	{
		return $this->belongsTo('App\Room', "said_in");
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
