<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('global')->create('content', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('alias')->nullable()->unique();
			$table->integer('template_id')->nullable();
			$table->text('data')->nullable()->default(null);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('global')->drop('content');
	}
}