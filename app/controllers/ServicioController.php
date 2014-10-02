<?php

class ServicioController extends \BaseController {

	protected $route = '/servicios';

	public function getIndex(){

		$servicios = Servicios::all();

		$array = array(
			'servicios' => $servicios,
			'route' => $this->route
		);

		return View::make('servicios.index')->with($array);

	}

	public function getCreate(){

		$array = array(
			'route' => $this->route
			);

		return View::make('servicios.create')->with( $array );
		
	}

	public function postCreate(){

     	$servicio = new Servicios();
		$servicio->descripcion = Input::get('descripcion');
		$servicio->save();

		return Redirect::to($this->route);

	}

    public function getEdit($id = ''){

    	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$servicio = Servicios::find($id);

			$array = array(
				'servicio' => $servicio,
				'route' => $this->route
				);	

			return View::make('servicios.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   		
   	}	

	public function postEdit( $id = '' ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$servicio = Servicios::find($id);
			$servicio->descripcion = Input::get('descripcion');
			$servicio->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

	}

   	public function getDelete( $id = '' ){

   		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$servicio = Servicios::find($id);

			$array = array(
				'servicio' => $servicio,
				'route' => $this->route
				);	

			return View::make('servicios.delete')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   								
   	}								 

    public function postDelete( $id = '' ){

    	if( $id != '' ):

			$id = Crypt::decrypt($id);
			$servicio = Servicios::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

    }

}