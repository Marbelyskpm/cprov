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
			'actividades'=>Actividades::all(),
			'tipo_empresas'=>TipoEmpresas::all(),
		);

		return View::make('empresas.create')->with( $array );
	}
	public function postCreate(){

		//dd(Input::all());

		$empresa = new Empresas();
		$empresa->codigo = Input::get('codigo');
		$empresa->nombre = Input::get('nombre');
		$empresa->id_persona = Input::get('id_persona');
		$empresa->direccion = Input::get('direccion');
		$empresa->telefono = Input::get('telefono');
		$empresa->id_municipio = Input::get('id_municipio');
		$empresa->fecha_ingreso = date("Y-m-d", strtotime(Input::get('fecha_ingreso')));
		$empresa->id_actividad = Input::get('id_actividad');
		$empresa->rif = Input::get('rif');
		$empresa->nit = Input::get('nit');
		$empresa->capital = Input::get('capital');
		$empresa->provisional = Input::get('provisional') != null ? true : false;
		$empresa->dias_provicional = Input::get('dias_provicional');
		$empresa->id_tipo_empresa = Input::get('id_tipo_empresa');

		$empresa->save();

		$registro = new Registro();
		$registro->numero = Input::get('num_registro');
		$registro->fecha = date("Y-m-d", strtotime(Input::get('fecha_registro')));

		$empresa->registro()->save($registro);

		$snc = new SNC();
		$snc->numero = Input::get('num_snc');
		$snc->fecha = date("Y-m-d", strtotime(Input::get('fecha_snc')));

		$empresa->snc()->save($snc);

		$ince = new INCE();
		$ince->numero = Input::get('num_ince');
		$ince->fecha = date("Y-m-d", strtotime(Input::get('fecha_ince')));

		$empresa->ince()->save($ince);

		$islr = new ISLR();
		$islr->numero = Input::get('num_islr');
		$islr->fecha = date("Y-m-d", strtotime(Input::get('fecha_islr')));

		$empresa->islr()->save($islr);

		$patente = new Patente();
		$patente->numero = Input::get('num_patente');
		$patente->fecha = date("Y-m-d", strtotime(Input::get('fecha_patente')));

		$empresa->patente()->save($patente);

		$coling = new ColegioDeIngenieros();
		$coling->numero = Input::get('num_coling');
		$coling->fecha = date("Y-m-d", strtotime(Input::get('fecha_coling')));

		$empresa->coling()->save($coling);

		$solmuni = new SolvenciaMunicipal();
		$solmuni->licencia = Input::get('num_solmuni');
		$solmuni->fecha = date("Y-m-d", strtotime(Input::get('fecha_solmuni')));

		$empresa->solmuni()->save($solmuni);

		$seguro = new SeguroSocial();
		$seguro->numero = Input::get('num_seguro');
		$seguro->fecha = date("Y-m-d", strtotime(Input::get('fecha_seguro')));

		$empresa->seguro()->save($seguro);

		if( Input::get('socios') != null ):
			$socios = Input::get('socios');
			$empresa->socios()->sync($socios);
		else:
			$empresa->socios()->sync(array());
		endif;

		/*
		$empresa->fecha_registro = date("Y-m-d", strtotime(Input::get('fecha_registro')));
		$empresa->num_registro = Input::get('num_registro');
		$empresa->snc = Input::get('snc');
		$empresa->fecha_snc = date("Y-m-d", strtotime(Input::get('fecha_snc')));
		$empresa->num_ince = Input::get('num_ince');
		$empresa->fecha_ince = date("Y-m-d", strtotime(Input::get('fecha_ince')));
		$empresa->num_islr = Input::get('num_islr');
		$empresa->fecha_islr = date("Y-m-d", strtotime(Input::get('fecha_islr')));
		$empresa->num_patente = Input::get('num_patente');
		$empresa->fecha_patente = date("Y-m-d", strtotime(Input::get('fecha_patente')));
		$empresa->licencia = Input::get('licencia');
		$empresa->fecha_municipal = date("Y-m-d", strtotime(Input::get('fecha_municipal')));
		*/
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
				'actividades'=>Actividades::all(),
				'tipo_empresas'=>TipoEmpresas::all(),
				);	

			return View::make('empresas.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
	
	public function postEdit( $id = '' ){

		$id = Crypt::decrypt($id);
		$empresa = Empresas::find($id);
		$empresa->codigo = Input::get('codigo');
		$empresa->nombre = Input::get('nombre');
		$empresa->id_persona = Input::get('id_persona');
		$empresa->direccion = Input::get('direccion');
		$empresa->telefono = Input::get('telefono');
		$empresa->id_municipio = Input::get('id_municipio');
		$empresa->fecha_ingreso = date("Y-m-d", strtotime(Input::get('fecha_ingreso')));
		$empresa->id_actividad = Input::get('id_actividad');
		$empresa->rif = Input::get('rif');
		$empresa->nit = Input::get('nit');
		$empresa->capital = Input::get('capital');
		$empresa->provisional = Input::get('provisional') != null ? true : false;
		$empresa->dias_provicional = Input::get('dias_provicional');
		$empresa->id_tipo_empresa = Input::get('id_tipo_empresa');

		$empresa->save();

		$empresa->registro->numero = Input::get('num_registro');
		$empresa->registro->fecha = date("Y-m-d", strtotime(Input::get('fecha_registro')));
		$empresa->registro->save();

		$empresa->snc->numero = Input::get('num_snc');
		$empresa->snc->fecha = date("Y-m-d", strtotime(Input::get('fecha_snc')));
		$empresa->snc->save();

		$empresa->ince->numero = Input::get('num_ince');
		$empresa->ince->fecha = date("Y-m-d", strtotime(Input::get('fecha_ince')));
		$empresa->ince->save();

		$empresa->islr->numero = Input::get('num_islr');
		$empresa->islr->fecha = date("Y-m-d", strtotime(Input::get('fecha_islr')));
		$empresa->islr->save();

		$empresa->patente->numero = Input::get('num_patente');
		$empresa->patente->fecha = date("Y-m-d", strtotime(Input::get('fecha_patente')));
		$empresa->patente->save();

		$empresa->coling->numero = Input::get('num_coling');
		$empresa->coling->fecha = date("Y-m-d", strtotime(Input::get('fecha_coling')));
		$empresa->coling->save();

		$empresa->solmuni->licencia = Input::get('num_solmuni');
		$empresa->solmuni->fecha = date("Y-m-d", strtotime(Input::get('fecha_solmuni')));
		$empresa->solmuni->save();

		$empresa->seguro->numero = Input::get('num_seguro');
		$empresa->seguro->fecha = date("Y-m-d", strtotime(Input::get('fecha_seguro')));
		$empresa->seguro->save();

		if( Input::get('socios') != null ):
			$socios = Input::get('socios');
			$empresa->socios()->sync($socios);
		else:
			$empresa->socios()->sync(array());
		endif;

		/*

		$registro = new Registro();
		$registro->numero = Input::get('num_registro');
		$registro->fecha = date("Y-m-d", strtotime(Input::get('fecha_registro')));

		$empresa->registro()->save($registro);

		$snc = new SNC();
		$snc->numero = Input::get('num_snc');
		$snc->fecha = date("Y-m-d", strtotime(Input::get('fecha_snc')));

		$empresa->snc()->save($snc);

		$ince = new INCE();
		$ince->numero = Input::get('num_ince');
		$ince->fecha = date("Y-m-d", strtotime(Input::get('fecha_ince')));

		$empresa->ince()->save($ince);

		$islr = new ISLR();
		$islr->numero = Input::get('num_islr');
		$islr->fecha = date("Y-m-d", strtotime(Input::get('fecha_islr')));

		$empresa->islr()->save($islr);

		$patente = new Patente();
		$patente->numero = Input::get('num_patente');
		$patente->fecha = date("Y-m-d", strtotime(Input::get('fecha_patente')));

		$empresa->patente()->save($patente);

		$coling = new ColegioDeIngenieros();
		$coling->numero = Input::get('num_coling');
		$coling->fecha = date("Y-m-d", strtotime(Input::get('fecha_coling')));

		$empresa->coling()->save($coling);

		$solmuni = new SolvenciaMunicipal();
		$solmuni->licencia = Input::get('num_solmuni');
		$solmuni->fecha = date("Y-m-d", strtotime(Input::get('fecha_solmuni')));

		$empresa->solmuni()->save($solmuni);

		$seguro = new SeguroSocial();
		$seguro->numero = Input::get('num_seguro');
		$seguro->fecha = date("Y-m-d", strtotime(Input::get('fecha_seguro')));

		$empresa->seguro()->save($seguro);

		*/
		/*
		$empresa->fecha_registro = date("Y-m-d", strtotime(Input::get('fecha_registro')));
		$empresa->num_registro = Input::get('num_registro');
		$empresa->snc = Input::get('snc');
		$empresa->fecha_snc = date("Y-m-d", strtotime(Input::get('fecha_snc')));
		$empresa->num_ince = Input::get('num_ince');
		$empresa->fecha_ince = date("Y-m-d", strtotime(Input::get('fecha_ince')));
		$empresa->num_islr = Input::get('num_islr');
		$empresa->fecha_islr = date("Y-m-d", strtotime(Input::get('fecha_islr')));
		$empresa->num_patente = Input::get('num_patente');
		$empresa->fecha_patente = date("Y-m-d", strtotime(Input::get('fecha_patente')));
		$empresa->licencia = Input::get('licencia');
		$empresa->fecha_municipal = date("Y-m-d", strtotime(Input::get('fecha_municipal')));
		*/
		return Redirect::to($this->route);

	}

	public function getShow( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$empresa = Empresas::find($id);

			$empresa->fecha_ingreso = date("d-m-Y", strtotime($empresa->fecha_ingreso));
			$empresa->fecha_snc = date("d-m-Y", strtotime($empresa->fecha_snc));
			$empresa->fecha_ince = date("d-m-Y", strtotime($empresa->fecha_ince));
			$empresa->fecha_patente = date("d-m-Y", strtotime($empresa->fecha_patente));
			/*
			$empresa->coling->fecha = date("d-m-Y", strtotime($empresa->coling->fecha));
			$empresa->seguro->fecha = date("d-m-Y", strtotime($empresa->seguro->fecha));
			*/
			$array = array(
				'route' => $this->route,
				'empresa' => $empresa,
				'personas' => Personas::all(),
				'municipios' => Municipios::all(),
				'actividades'=>Actividades::all(),
				'tipo_empresas'=>TipoEmpresas::all(),
				);	

			return View::make('empresas.show')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;

	}

	public function getDelete( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$empresa = Empresas::find($id);

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

   public function postFindrepresentante(){

   		$persona = Personas::where('cedula','=',Input::get('cedula'))->get();

   		if(count($persona) > 0):
   			return $persona[0];
   		else:
   			return 0;
   		endif;

   }

   public function getRepresentante(){

   		return View::make('empresas.representante')->with( array( 'route' => $this->route ) );

   }

   public function postRepresentante(){

   		$persona = new Personas();
   		$persona->nombre = Input::get('nombre');
   		$persona->cedula = Input::get('cedula');
   		$persona->rif = Input::get('rif');

   		if($persona->save()):
   			$array = array(
   				'id' => $persona->id,
   				'nombre' => $persona->nombre,
   				'cedula' => $persona->cedula,
   				);
   			return Response::json($array);
   		else:
   			return 0;
   		endif;

   }

   public function postFindsocio(){

   		$persona = Personas::where('cedula','=',Input::get('cedula'))->get();

   		if(count($persona) > 0):
   			return $persona[0];
   		else:
   			return 0;
   		endif;

   }

   public function postFindsociobyid(){

   		$persona = Personas::find(Input::get('id'));
   		return $persona;

   		if(count($persona) > 0):
   			return $persona;
   		else:
   			return 0;
   		endif;

   }

   public function getSocios(){

   		return View::make('empresas.socios')->with( array( 'route' => $this->route ) );

   }

   public function postSocios(){

   		$persona = new Personas();
   		$persona->nombre = Input::get('nombre');
   		$persona->cedula = Input::get('cedula');
   		$persona->rif = Input::get('rif');

   		if($persona->save()):
   			$array = array(
   				'id' => $persona->id,
   				'nombre' => $persona->nombre,
   				'cedula' => $persona->cedula,
   				);
   			return Response::json($array);
   		else:
   			return 0;
   		endif;

   }

   public function getReporte( $id = '' ){

   		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$empresa = Empresas::find($id);

			$empresa->fecha_ingreso = date("d-m-Y", strtotime($empresa->fecha_ingreso));
			$empresa->fecha_snc = date("d-m-Y", strtotime($empresa->fecha_snc));
			$empresa->fecha_ince = date("d-m-Y", strtotime($empresa->fecha_ince));
			$empresa->fecha_patente = date("d-m-Y", strtotime($empresa->fecha_patente));
			/*
			$empresa->coling->fecha = date("d-m-Y", strtotime($empresa->coling->fecha));
			$empresa->seguro->fecha = date("d-m-Y", strtotime($empresa->seguro->fecha));
			*/
			include('/mpdf/mpdf.php');

			$html = '<html><body>'
			. '<img src="/images/etiqueta.png" width="100%" height="auto">'
            . '<p>Hola Mundo.</p>'
            . '</body></html>';

            $mpdf=new mPDF();
			$mpdf->Bookmark('Start of the document');
			$mpdf->WriteHTML($html);
			$mpdf->Output();

    
    		//return mPDF::render($html, 'A4', 'portrait')->show();

		else:

			return Redirect::to($this->route);
		endif;

   }


}