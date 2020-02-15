<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CharactersRooms extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('characters_rooms', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->unsignedBigInteger("room_id");
			$table->foreign("room_id")->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedBigInteger("character_id");
			$table->foreign("character_id")->references('id')->on('characters')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('characters_rooms');
	}
}
