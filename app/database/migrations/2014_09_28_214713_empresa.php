<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration {

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
            $table->integer('id_servicio');
            $table->integer('id_actividad');
            $table->string('rif');
            
            $table->date('fecha_registro');
            $table->string('num_registro');
            $table->decimal('capital');
            $table->string('snc');
            $table->date('fecha_snc');
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
