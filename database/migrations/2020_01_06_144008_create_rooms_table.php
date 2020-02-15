<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string("name");
			$table->string("description")->nullable();
			$table->boolean("private")->default(0);
			$table->unsignedBigInteger("created_by_user");
			$table->foreign("created_by_user")->references("id")->on("users");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('rooms');
	}
}
