<?php

class Municipios extends \Eloquent {
	protected $fillable = [];
	protected $table = 'municipios';

	public function empresas(){

	return $this->hasMany('Empresas','id_municipio','id');	
	}
}