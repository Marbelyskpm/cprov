<?php

class PersonaController extends \BaseController {

	protected $route = '/personas';

	public function getIndex(){

		$personas = Personas::all();

		$array = array(
			'personas' => $personas,
			'route' => $this->route
			);

		return View::make('personas.index')->with($array);

	}
	public function getCreate(){

		$array = array(
			'route' => $this->route,
			);

		return View::make('personas.create')->with( $array );

	}
	public function postCreate(){

		$persona = new Personas();
		$persona->nombre = Input::get('nombre');
		$persona->cedula = Input::get('cedula');
		$persona->rif = Input::get('rif');
		$persona->save();

		return Redirect::to($this->route);
		
	}
	public function getEdit( $id = '' ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$persona = Personas::find($id);

			$array = array(
				'persona' => $persona,
				'route' => $this->route
				);	

			return View::make('personas.edit')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;

	}
	public function postEdit( $id = '' ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$persona = Personas::find($id);
			$persona->nombre = Input::get('nombre');
			$persona->cedula = Input::get('cedula');
			$persona->rif = Input::get('rif');
			$persona->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);
		endif;

	}
	public function getDelete( $id = ''){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$persona = Personas::find($id);

			$array = array(
				'persona' => $persona,
				'route' => $this->route
				);	

			return View::make('personas.delete')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;

	}
	public function postDelete( $id = '' ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$persona = Personas::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);
		endif;
	}


}