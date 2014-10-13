<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function($table)
		{
		    $table->increments('id');
		    $table->string('codigo');
		    $table->string('nombre');
		    $table->integer('id_persona');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('id_municipio');
            $table->date('fecha_ingreso');
            $table->integer('id_actividad');
            $table->string('rif');
            $table->string('nit');
            $table->decimal('capital');
            $table->boolean('provisional');
            $table->integer('dias_provicional');
            $table->integer('id_tipo_empresa');
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
		Schema::drop('empresas');
	}

}
