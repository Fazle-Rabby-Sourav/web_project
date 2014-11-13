<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
			Schema::table('photos', function($table)
			  {
			   $table->integer('category_id')->unsigned();
			                  
				$table->foreign('category_id')
				     ->references('id')->on('categories')
				     ->onUpdate('cascade')
				     ->onDelete('cascade');
			  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		$table->dropColumn('category_id');
	}

}
