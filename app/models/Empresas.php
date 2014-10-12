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

	public function tipo_empresa(){

		return $this->belongsTo('TipoEmpresas','id_tipo_empresa');
	}

	public function municipio(){
        
        return $this->belongsTo('Municipios','id_municipio');

	}

    public function servicio(){

	    return $this->belongsTo('Servicios','id_servicio');
    }

    public function actividad(){

    	return $this->belongsTo('Actividades','id_actividad');
    }
}
