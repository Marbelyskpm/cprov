<?php

class TipoEmpresas extends \Eloquent {
	protected $fillable = [];
	protected $table = 'tipo_empresas';

	public function empresas(){

		return $this->hasMany('Empresas','id_tipo_empresa','id');
	}
}