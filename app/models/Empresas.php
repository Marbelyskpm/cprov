<?php

class Empresas extends \Eloquent {
	protected $fillable = [];
	protected $table = 'empresas';

	public function representante(){

		return $this->belongsTo('Personas', 'id_persona');

	}

	public function socios(){

		return $this->belongsToMany('Personas','socios','id_empresa','id_persona');
	}

}