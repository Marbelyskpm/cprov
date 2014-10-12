<?php

class Personas extends \Eloquent {

    use SoftDeletingTrait;
	protected $fillable = [];
	protected $table = 'personas';

	public function empresas(){

		return $this->hasMany('Empresas','id_persona','id');
	}

	public function esSocio(){

		return $this->belongsToMany('Empresas','socios','id_persona','id_empresa');
	}
	
}