<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Segurosocial extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('segurosocial', function($table)
		{
		    $table->increments('id');
		    $table->string('id_empresa');
            $table->string('num_segurosocial');
            $table->date('fecha_segurosocial');
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
		Schema::drop('segurosocial');
	}
}
