<?php

class TipoEmpresaController extends \BaseController {

	protected $route = '/tipoempresas';

	public function getIndex(){

		$tipo_empresa = TipoEmpresas::all();

		$array = array(
		'tipo_empresas' => $tipo_empresa,
		'route' => $this->route
		);

		return View::make('tipo_empresas.index')->with($array);

	}

	public function getCreate(){

		$array = array(
			'route' => $this->route
			);

		return View::make('tipo_empresas.create')->with( $array );
		
	}

	public function postCreate(){

     	$tipo_empresa = new TipoEmpresas();
		$tipo_empresa->descripcion = Input::get('descripcion');
		$tipo_empresa->prefijo = Input::get('prefijo');
		$tipo_empresa->save();

		return Redirect::to($this->route);

	}

    public function getEdit($id = ''){

    	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$tipo_empresa = TipoEmpresas::find($id);

			$array = array(
				'tipo_empresa' => $tipo_empresa,
				'route' => $this->route
				);	

			return View::make('tipo_empresas.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   		
   	}	

	public function postEdit( $id = '' ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$tipo_empresa = TipoEmpresas::find($id);
			$tipo_empresa->descripcion = Input::get('descripcion');
			$tipo_empresa->prefijo = Input::get('prefijo');
			$tipo_empresa->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

	}

   	public function getDelete( $id = '' ){

   		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$tipo_empresa = TipoEmpresas::find($id);

			$array = array(
				'tipo_empresa' => $tipo_empresa,
				'route' => $this->route
				);	

			return View::make('tipo_empresas.delete')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;
   								
   	}								 

    public function postDelete( $id = '' ){

    	if( $id != '' ):

			$id = Crypt::decrypt($id);
			$tipo_empresa = TipoEmpresas::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

    }

}