<?php

class ActividadController extends \BaseController {
		protected $route = '/actividades';

	public function getIndex(){

		$actividades = Actividades::all();

		$array = array(
		'actividades' => $actividades,
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

	public function postCreate(){

     	$actividad = new Actividades();
		$actividad->descripcion = Input::get('descripcion');
		$actividad->save();

		return Redirect::to($this->route);

	}

    public function getEdit($id = ''){

    	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$actividad = Actividades::find($id);

			$array = array(
				'actividad' => $actividad,
				'route' => $this->route
				);	

			return View::make('actividades.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   		
   	}	

	public function postEdit( $id = '' ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$actividad = Actividades::find($id);
			$actividad->descripcion = Input::get('descripcion');
			$actividad->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

	}

   	public function getDelete( $id = '' ){

   		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$actividad = Actividades::find($id);

			$array = array(
				'actividad' => $actividad,
				'route' => $this->route
				);	

			return View::make('actividades.delete')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   								
   	}								 

    public function postDelete( $id = '' ){

    	if( $id != '' ):

			$id = Crypt::decrypt($id);
			$actividad = Actividades::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

    }
    }
	