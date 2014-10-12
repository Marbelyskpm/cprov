<?php

class Actividades extends \Eloquent {
	protected $fillable = [];

	protected $table = 'actividades';

	public function empresas(){

		return $this->hasMany('Empresas','id_actividad','id');
	}
}