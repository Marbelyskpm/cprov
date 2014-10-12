<?php

class Servicios extends \Eloquent {
	protected $fillable = [];
	protected $table = 'servicios';

	public function empresas(){

		return $thi->hasMany('Empresas','id_servicio','id');
	}
}