<?php

class ActividadController extends \BaseController {
		protected $route = '/actividades';

	public function getIndex(){

         $actividades = Actividades::all();

			$array = array(
			'municipios' => $actividades,
			'route' => $this->route
			);

			return View::make('actividades.index')->with($array);
		    
		}

    public function getCreate(){

    	$array = array(
			'route' => $this->route
			);

			return View::make('actividades.create')->with( $array );
		}
    }
	