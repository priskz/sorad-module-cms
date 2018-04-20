<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('global')->create('template', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')->nullable();
			$table->string('view')->nullable();
			$table->string('slug')->nullable();
			$table->string('model_type')->nullable();
			$table->string('type_context')->nullable();
			$table->string('status')->nullable()->default('DISABLED');
			$table->string('title')->nullable();
			$table->text('definition')->nullable()->default(null);;
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
		Schema::connection('global')->drop('template');
	}
}