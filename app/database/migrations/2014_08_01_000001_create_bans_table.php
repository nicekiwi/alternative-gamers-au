<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bans', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('player_id')->unsigned()->index();
			$table->foreign('player_id')->references('id')->on('players');

			$table->integer('banned_by')->unsigned()->index();
			$table->foreign('banned_by')->references('id')->on('players');

			$table->text('banned_for');

			$table->timestamp('banned_until');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bans');
	}

}
