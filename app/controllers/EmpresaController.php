<?php

class EmpresaController extends \BaseController {

	protected $route = '/empresas';

	public function getIndex()
	{
		
		$empresas = Empresas::all();

			$array = array(
			'empresas' => $empresas,
			'route' => $this->route
			);

			return View::make('empresas.index')->with($array);
	}

	public function getCreate()
	{
		$array = array(
			'route' => $this->route,
			'personas' => Personas::all(),
			'municipios' => Municipios::all(),
			'servicios' => Servicios::all(),
		);

		return View::make('empresas.create')->with( $array );
	}
	public function postCreate(){

		$empresa = new Empresas();
		$empresa->codigo = Input::get('codigo');
		$empresa->nombre = Input::get('nombre');
		$empresa->id_persona = Input::get('id_persona');
		$empresa->direccion = Input::get('direccion');
		$empresa->telefono = Input::get('telefono');
		$empresa->id_municipio = Input::get('id_municipio');
		$empresa->fecha_ingreso = Input::get('fecha_ingreso');
		$empresa->id_servicio = Input::get('id_servicio');
		$empresa->id_actividad = Input::get('id_actividad');
		$empresa->rif = Input::get('rif');
		$empresa->fecha_registro = Input::get('fecha_registro');
		$empresa->num_registro = Input::get('num_registro');
		$empresa->capital = Input::get('capital');
		$empresa->snc = Input::get('snc');
		$empresa->fecha_snc = Input::get('fecha_snc');
		$empresa->provisional = Input::get('provisional');
		$empresa->dias_provicional = Input::get('dias_provicional');
		$empresa->id_tipo_empresa = Input::get('id_tipo_empresa');
		$empresa->save();

		return Redirect::to($this->route);
	}

	public function getEdit(){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$persona = Personas::find($id);

			$array = array(
				'persona' => $empresas,
				'route' => $this->route
				);	

			return View::make('empresas.edit')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;

	}
	
	public function postEdit( $id = '' ){

		if( $id != '' ):
		$empresa = new Empresas();
		$empresa->codigo = Input::get('codigo');
		$empresa->nombre = Input::get('nombre');
		$empresa->id_persona = Input::get('id_persona');
		$empresa->direccion = Input::get('direccion');
		$empresa->telefono = Input::get('telenono');
		$empresa->id_municipio = Input::get('id_municipio');
		$empresa->fecha_ingreso = Input::get('fecha_ingreso');
		$empresa->id_servicio = Input::get('id_servicio');
		$empresa->id_actividad = Input::get('id_actividad');
		$empresa->rif = Input::get('rif');
		$empresa->fecha_registro = Input::get('fecha_registro');
		$empresa->numero_registro = Input::get('numero_registro');
		$empresa->capital = Input::get('capital');
		$empresa->snc = Input::get('snc');
		$empresa->fecha_snc = Input::get('fecha_snc');
		$empresa->provicional = Input::get('provicional');
		$empresa->dias_provicional = Input::get('dias_provicional');
		$empresa->id_tipo_emp = Input::get('id_tipo_emp');
		$empresa->save();
		return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);
		endif;
	}

	public function getDelete(){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$persona = Personas::find($id);

			$array = array(
				'empresa' => $empresa,
				'route' => $this->route
				);	

			return View::make('empresas.delete')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;
	}
   
   public function postDelete($id = '' ){

   	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$empresa = Empresas::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);
		endif;


   }


}