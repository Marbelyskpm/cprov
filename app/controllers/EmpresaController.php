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
			'actividades'=>Actividades::all(),
			'tipo_empresas'=>TipoEmpresas::all(),
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
		$empresa->fecha_ingreso = date("Y-m-d", strtotime(Input::get('fecha_ingreso')));
		$empresa->id_servicio = Input::get('id_servicio');
		$empresa->id_actividad = Input::get('id_actividad');
		$empresa->rif = Input::get('rif');
		$empresa->fecha_registro = date("Y-m-d", strtotime(Input::get('fecha_registro')));
		$empresa->num_registro = Input::get('num_registro');
		$empresa->capital = Input::get('capital');
		$empresa->snc = Input::get('snc');
		$empresa->fecha_snc = date("Y-m-d", strtotime(Input::get('fecha_snc')));
		$empresa->provisional = Input::get('provisional') != null ? true : false;
		$empresa->dias_provicional = Input::get('dias_provicional');
		$empresa->id_tipo_empresa = Input::get('id_tipo_empresa');
		$empresa->num_ince = Input::get('num_ince');
		$empresa->fecha_ince = date("Y-m-d", strtotime(Input::get('fecha_ince')));
		$empresa->num_islr = Input::get('num_islr');
		$empresa->fecha_islr = date("Y-m-d", strtotime(Input::get('fecha_islr')));
		$empresa->num_patente = Input::get('num_patente');
		$empresa->fecha_patente = date("Y-m-d", strtotime(Input::get('fecha_patente')));
		$empresa->licencia = Input::get('licencia');
		$empresa->fecha_municipal = date("Y-m-d", strtotime(Input::get('fecha_municipal')));
		$empresa->save();

		return Redirect::to($this->route);
	}

	public function getEdit( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$empresa = Empresas::find($id);

			$array = array(
				'route' => $this->route,
				'empresa' => $empresa,
				'personas' => Personas::all(),
				'municipios' => Municipios::all(),
				'servicios' => Servicios::all(),
				'actividades'=>Actividades::all(),
				'tipo_empresas'=>TipoEmpresas::all(),
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
		$empresa->telefono = Input::get('telefono');
		$empresa->id_municipio = Input::get('id_municipio');
		$empresa->fecha_ingreso = date("Y-m-d", strtotime(Input::get('fecha_ingreso')));
		$empresa->id_servicio = Input::get('id_servicio');
		$empresa->id_actividad = Input::get('id_actividad');
		$empresa->rif = Input::get('rif');
		$empresa->fecha_registro = date("Y-m-d", strtotime(Input::get('fecha_registro')));
		$empresa->num_registro = Input::get('num_registro');
		$empresa->capital = Input::get('capital');
		$empresa->snc = Input::get('snc');
		$empresa->fecha_snc = date("Y-m-d", strtotime(Input::get('fecha_snc')));
		$empresa->provisional = Input::get('provisional') != null ? true : false;
		$empresa->dias_provicional = Input::get('dias_provicional');
		$empresa->id_tipo_empresa = Input::get('id_tipo_empresa');
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