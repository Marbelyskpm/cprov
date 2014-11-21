<?php

class EmpresaController extends \BaseController {

	protected $route = '/empresas';

	public function getIndex()
	{
		$empresas = Empresas::all();
		$tipo_empresas = TipoEmpresas::all();
		$municipios = Municipios::all();
		$filtro = array(
			'desde' => '',
			'hasta' => '',
			'municipio' => '',
			'tipo_empresa' => ''
			);

			$array = array(
			'empresas' => $empresas,
			'tipo_empresas' => $tipo_empresas,
			'municipios' => $municipios,
			'filtro' => $filtro,
			'route' => $this->route
			);

		return View::make('empresas.index')->with($array);

	}

	public function postIndex()
	{

		$desde = Input::get('desde') != '' ? date("Y-m-d", strtotime(Input::get('desde'))) : '';
		$hasta = Input::get('hasta') != '' ? date("Y-m-d", strtotime(Input::get('hasta'))) : '';
		$municipio = Input::get('municipio');
		$tipo_empresa = Input::get('tipo_empresa');

		$empresas = null;

		$date_filter = 'created_at';

		if( ( $desde != '' && $hasta != '' ) && ( $municipio == 0 && $tipo_empresa == 0 ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde )
							->where( $date_filter, '<', $hasta )
							->get();

		elseif( ( $municipio != 0 ) && ( $tipo_empresa == 0 && $desde == '' && $hasta == '' ) ):

			$empresas = Empresas::where( 'id_municipio', '=', $municipio )
							->get();

		elseif( ( $tipo_empresa != 0 ) && ( $municipio == 0 && $desde == '' && $hasta == '' ) ):

			$empresas = Empresas::where( 'id_tipo_empresa', '=', $tipo_empresa )
							->get();

		elseif( ( $desde != '' && $hasta != '' && $municipio != 0 ) && ( $tipo_empresa == 0 ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde )
							->where( $date_filter, '<', $hasta )
							->where( 'id_municipio', '=', $municipio )
							->get();

		elseif( ( $desde != '' && $hasta != '' && $tipo_empresa != 0 ) && ( $municipio == 0 ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde )
							->where( $date_filter, '<', $hasta )
							->where( 'id_tipo_empresa', '=', $tipo_empresa )
							->get();

		elseif( ( $municipio != 0 && $tipo_empresa != 0 ) && ( $desde == '' && $hasta == '' ) ):

			$empresas = Empresas::where( 'id_tipo_empresa', '=', $tipo_empresa )
							->where( 'id_municipio', '=', $municipio )
							->get();

		elseif( ( $municipio != 0 && $tipo_empresa != 0 ) && ( $desde != '' && $hasta != '' ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde)
							->where( 'updated_at', '<', $hasta)
							->where( 'id_municipio', '=', $municipio )
							->where( 'id_tipo_empresa', '=', $tipo_empresa )
							->get();

		else:

			$empresas = Empresas::all();

		endif;

		$tipo_empresas = TipoEmpresas::all();
		$municipios = Municipios::all();
		$filtro = array(
			'desde' => $desde,
			'hasta' => $hasta,
			'municipio' => $municipio,
			'tipo_empresa' => $tipo_empresa
			);

		$array = array(
			'empresas' => $empresas,
			'tipo_empresas' => $tipo_empresas,
			'municipios' => $municipios,
			'route' => $this->route,
			'filtro' => $filtro
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

		$year = date('Y');
		$month = date('m');
		$day = '31';

		if( $month > 6 ):
			$month = '12';
		else:
			$month = '06';
			$day = '30';
		endif;

		$fecha_vencimiento = $day.'-'.$month.'-'.$year;

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
		$empresa->fecha_vencimiento = date("Y-m-d", strtotime($fecha_vencimiento));

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

		/*$islr = new ISLR();
		$islr->numero = Input::get('num_islr');
		$islr->fecha = date("Y-m-d", strtotime(Input::get('fecha_islr')));

		$empresa->islr()->save($islr);*/

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

		$solvencialaboral = new SolvenciaLaboral();
		$solvencialaboral->numero = Input::get('num_solvencialaboral');
		$solvencialaboral->fecha = date("Y-m-d", strtotime(Input::get('fecha_solvencialaboral')));

		$empresa->solvencialaboral()->save($solvencialaboral);

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

		$year = date('Y');
		$month = date('m');
		$day = '31';

		if( $month > 6 ):
			$month = '12';
		else:
			$month = '06';
			$day = '30';
		endif;

		$fecha_vencimiento = $day.'-'.$month.'-'.$year;

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
		$empresa->fecha_vencimiento = date("Y-m-d", strtotime($fecha_vencimiento));

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

		/*$empresa->islr->numero = Input::get('num_islr');
		$empresa->islr->fecha = date("Y-m-d", strtotime(Input::get('fecha_islr')));
		$empresa->islr->save();*/

		$empresa->patente->numero = Input::get('num_patente');
		$empresa->patente->fecha = date("Y-m-d", strtotime(Input::get('fecha_patente')));
		$empresa->patente->save();

		$empresa->coling->numero = Input::get('num_coling');
		$empresa->coling->fecha = date("Y-m-d", strtotime(Input::get('fecha_coling')));
		$empresa->coling->save();

		$empresa->solmuni->licencia = Input::get('num_solmuni');
		$empresa->solmuni->fecha = date("Y-m-d", strtotime(Input::get('fecha_solmuni')));
		$empresa->solmuni->save();


		$empresa->solvencialaboral->numero = Input::get('num_solvencialaboral');
		$empresa->solvencialaboral->fecha = date("Y-m-d", strtotime(Input::get('fecha_solvencialaboral')));
		$empresa->solvencialaboral->save();

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
			$usuarios = User::where('tipo', '=', 'vip')->take(1)->get();
			$usuarios = $usuarios[0];
			$empresa->fecha_ingreso = date("d-m-Y", strtotime($empresa->fecha_ingreso));
			$empresa->fecha_snc = date("d-m-Y", strtotime($empresa->fecha_snc));
			$empresa->fecha_ince = date("d-m-Y", strtotime($empresa->fecha_ince));
			$empresa->fecha_patente = date("d-m-Y", strtotime($empresa->fecha_patente));
			$empresa->fecha_vencimiento = date("d-m-Y", strtotime($empresa->fecha_vencimiento));
			$fecha = date('d-m-Y', strtotime("$empresa->fecha_ingreso+6 months"));
			/*
			$empresa->coling->fecha = date("d-m-Y", strtotime($empresa->coling->fecha));
			$empresa->seguro->fecha = date("d-m-Y", strtotime($empresa->seguro->fecha));
			*/
			include('/mpdf/mpdf.php'); 

			$html = '<html><body>'
			. '<img src="/images/logo_sistema-1.png" width="12%" height="auto">'

           

            . '<p align="center">
               CERTIFICADO DE INSCRIPCIÓN EN EL REGISTRO DE ORGANIZACIONES </p>'

            . '<p align="justify">

                Por medio de la presente damos constancia que la empresa '.$empresa->nombre.',representada por '.$empresa->representante->nombre.',
                cédula de identidad número '.$empresa->representante->cedula.', se encuentra formalmente inscrita
                en el registro de Organizaciones del Gobierno Bolivariano del Estado Aragua, quedando anotada con el N° '.$empresa->codigo .'
                de fecha '.$empresa->fecha_ingreso .', actualizada el:'.$empresa->fecha_ingreso .' con el Rif '.$empresa->rif .', Nit '.$empresa->nit .'. </p>'
            
            . '<p>Dirección: '.$empresa->direccion .', Municipio: '.$empresa->municipio->nombre .' </p>'
            . '<p>Telefono: '.$empresa->telefono .' </p>'

                      
            . '<p align="right">
                SNC: '.$empresa->snc->numero .  '  Fecha: '.$empresa->snc->fecha .'</p>'     
            . '<p align="right">
                INCE: '.$empresa->ince->numero .'  Fecha : '.$empresa->ince->fecha .'</p>'            
            . '<p align="right" >IVSS: '.$empresa->seguro->numero .' Fecha: '.$empresa->seguro->fecha .' </p>'
            
           
          
         
            


             .'<p align="center"> '.$usuarios->nombre.' '.$usuarios->apellido.'</p>'


             . '<p align="center">     

             SECRETARIA DEL PODER POPULAR PARA LA HACIENDA, ADMINISTRACIÓN Y FINANZAS Decreto N° 2977 de fecha 22-04-2013 publicado en Gaceta oficial Ordinaria del 
              Estado Aragua de fecha 22 de Abril del año 2013, valido desde  '.$empresa->fecha_ingreso.' hasta el '.$empresa->fecha_vencimiento.'  </p>'


            . '<img src="/images/linea.png" width="100%" height="5%">'

       
          
             . '<img src="/images/logo_sistema-1.png" width="12%" height="auto">'

           

            . '<p align="center">
             CERTIFICADO DE INSCRIPCIÓN EN EL REGISTRO DE ORGANIZACIONES </p>'

            . '<p align="justify">

            Por medio de la presente damos constancia que la empresa '.$empresa->nombre.',representada por '.$empresa->representante->nombre.',

                cédula de identidad número '.$empresa->representante->cedula.', se encuentra formalmente inscrita
                en el registro de Organizaciones del Gobierno Bolivariano del Estado Aragua, quedando anotada con el N° '.$empresa->codigo .'
                de fecha '.$empresa->fecha_ingreso .', actualizada el:'.$empresa->fecha_ingreso .' con el Rif '.$empresa->rif .', Nit '.$empresa->nit .'. </p>'
            
            . '<p>Dirección: '.$empresa->direccion .', Municipio: '.$empresa->municipio->nombre .' </p>'
            
            . '<p>Telefono: '.$empresa->telefono .' </p>'
                      
            . '<p align="right">
                SNC: '.$empresa->snc->numero .  '  Fecha: '.$empresa->snc->fecha .' </p>'
           
            . '<p align="right">
                INCE: '.$empresa->ince->numero .'  Fecha : '.$empresa->ince->fecha .' </p>'
            
            . '<p align="right" >IVSS: '.$empresa->seguro->numero .' Fecha: '.$empresa->seguro->fecha .' </p>'
            
           
            
            .'<p align="center"> '.$usuarios->nombre.' '.$usuarios->apellido.'</p>'


             . '<p align="center">     

             SECRETARIA DEL PODER POPULAR PARA LA HACIENDA, ADMINISTRACIÓN Y FINANZAS Decreto N° 2977 de fecha 22-04-2013 publicado en Gaceta oficial Ordinaria del 
              Estado Aragua de fecha 22 de Abril del año 2013, valido desde  '.$empresa->fecha_ingreso.' hasta el '.$fecha.' </p>'

              
           
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

   public function postReporte(){

		$empresas = null;

		$desde = Input::get('desde') != '' ? date("Y-m-d", strtotime(Input::get('desde'))) : '';
		$hasta = Input::get('hasta') != '' ? date("Y-m-d", strtotime(Input::get('hasta'))) : '';
		$municipio = Input::get('municipio');
		$tipo_empresa = Input::get('tipo_empresa');

		$empresas = null;

		$date_filter = 'created_at';

		if( ( $desde != '' && $hasta != '' ) && ( $municipio == 0 && $tipo_empresa == 0 ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde )
							->where( $date_filter, '<', $hasta )
							->get();

		elseif( ( $municipio != 0 ) && ( $tipo_empresa == 0 && $desde == '' && $hasta == '' ) ):

			$empresas = Empresas::where( 'id_municipio', '=', $municipio )
							->get();

		elseif( ( $tipo_empresa != 0 ) && ( $municipio == 0 && $desde == '' && $hasta == '' ) ):

			$empresas = Empresas::where( 'id_tipo_empresa', '=', $tipo_empresa )
							->get();

		elseif( ( $desde != '' && $hasta != '' && $municipio != 0 ) && ( $tipo_empresa == 0 ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde )
							->where( $date_filter, '<', $hasta )
							->where( 'id_municipio', '=', $municipio )
							->get();

		elseif( ( $desde != '' && $hasta != '' && $tipo_empresa != 0 ) && ( $municipio == 0 ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde )
							->where( $date_filter, '<', $hasta )
							->where( 'id_tipo_empresa', '=', $tipo_empresa )
							->get();

		elseif( ( $municipio != 0 && $tipo_empresa != 0 ) && ( $desde == '' && $hasta == '' ) ):

			$empresas = Empresas::where( 'id_tipo_empresa', '=', $tipo_empresa )
							->where( 'id_municipio', '=', $municipio )
							->get();

		elseif( ( $municipio != 0 && $tipo_empresa != 0 ) && ( $desde != '' && $hasta != '' ) ):

			$empresas = Empresas::where( $date_filter, '>', $desde)
							->where( 'updated_at', '<', $hasta)
							->where( 'id_municipio', '=', $municipio )
							->where( 'id_tipo_empresa', '=', $tipo_empresa )
							->get();

		else:

			$empresas = Empresas::all();

		endif;

		$tipo_empresas = TipoEmpresas::all();
		$municipios = Municipios::all();

   	$args = array(
   		'empresas' => $empresas
   		);

    return PDF::load( View::make('pdfs.lista_empresas', $args) , 'A4', 'portrait')->show();

   }

   public function postReporte2(){

   		$empresas = null;

   		if(Input::get('busqueda') == '' ):

   			$empresas = Empresas::all();

   		elseif(Input::get('busqueda') == 'intervalo'):

   			$empresas = Empresas::whereBetween( 'created_at', array( Input::get('desde'), Input::get('hasta') ) );

   		elseif(Input::get('busqueda') == 'municipio'):

   			$municipio = Municipios::where('nombre','=',Input::get('municipio'))->take(1)->get();

   		endif;

    	include('/mpdf/mpdf.php'); 

			$html = '<img src="/images/etiqueta.png" width="100%" height="45">'
      .'<div class="container-fluid main-content">'
        .'<div class="page-title">'
		.'<h1>'
            .'Empresas'
		.'</h1>'
        .'</div>'
        	.'<table><tbody>'
              	.'<tr style="display:block">'
                    .'<th style="padding:10px; background-color: #999;border:1px;margin:1em;">'
                      .'Codigo'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Nombre'
                    .'</th>'
                     .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Representante'
                    .'</th>'
                     .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Direccion'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Rif'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Telefono'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Creado el '
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Actualizado el'
                    .'</th>'
                .'</tr>';

        foreach($empresas as $empresa):

        	$html .= '<tr>'
                      .'<td>'
                        . $empresa->codigo 
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->nombre
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->representante->nombre
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->direccion 
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->rif
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->telefono
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->created_at
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$empresa->updated_at 
                      .'</td>'
                    .'</tr>';
        endforeach;
                  
        $html .'</tbody>';

            $mpdf=new mPDF();
			$mpdf->WriteHTML($html);
			$mpdf->Output();

   }


}