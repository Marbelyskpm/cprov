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

    public function registro(){

    	return $this->hasOne('Registro', 'id_empresa', 'id');

    }

    public function snc(){

    	return $this->hasOne('SNC', 'id_empresa', 'id');

    }

    public function ince(){

    	return $this->hasOne('INCE', 'id_empresa', 'id');

    }

    public function islr(){

    	return $this->hasOne('ISLR', 'id_empresa', 'id');

    }

    public function patente(){

    	return $this->hasOne('Patente', 'id_empresa', 'id');

    }

    public function coling(){

    	return $this->hasOne('ColegioDeIngenieros', 'id_empresa', 'id');

    }

    public function solmuni(){

    	return $this->hasOne('SolvenciaMunicipal', 'id_empresa', 'id');

    }

    public function seguro(){

        return $this->hasOne('SeguroSocial', 'id_empresa', 'id');

    }

    public function solvencialaboral(){

        return $this->hasOne('SolvenciaLaboral', 'id_empresa', 'id');

    }
    
}
