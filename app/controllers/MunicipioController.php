<?php

class MunicipioController extends \BaseController {

	protected $route = '/municipios';

	public function getIndex(){

		$municipios = Municipios::all();

		$array = array(
		'municipios' => $municipios,
		'route' => $this->route
		);

		return View::make('municipios.index')->with($array);

	}

	public function getCreate(){

		$array = array(
			'route' => $this->route
			);

		return View::make('municipios.create')->with( $array );
		
	}

	public function postCreate(){

     	$municipio = new Municipios();
		$municipio->nombre = Input::get('nombre');
		$municipio->save();

		return Redirect::to($this->route);

	}

    public function getEdit($id = ''){

    	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$municipio = Municipios::find($id);

			$array = array(
				'municipio' => $municipio,
				'route' => $this->route
				);	

			return View::make('municipios.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   		
   	}	

	public function postEdit( $id = '' ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$municipio = Municipios::find($id);
			$municipio->nombre = Input::get('nombre');
			$municipio->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

	}

   	public function getDelete( $id = '' ){

   		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$municipio = Municipios::find($id);

			$array = array(
				'municipio' => $municipio,
				'route' => $this->route
				);	

			return View::make('municipios.delete')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   								
   	}								 

    public function postDelete( $id = '' ){

    	if( $id != '' ):

			$id = Crypt::decrypt($id);
			$municipio = Municipios::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

    }

}