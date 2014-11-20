<?php

class AjaxController extends \BaseController {

	public function postCodigoempresas(){

		$tipo_empresa = TipoEmpresas::find(Input::get('id'));

		$ceros = '00000';

		$year = date('y');

		$contador_de_ceros = 0;

		$empresas = DB::table('empresas')
					->where('id_tipo_empresa', '=', $tipo_empresa->id)
                    ->orderBy('created_at', 'desc')
                    ->first();

        if($empresas == null ):

			return $tipo_empresa->prefijo.$year.'000001';

        else:

			$contador_de_empresas = $empresas->id;

			$tmp = $contador_de_empresas;

			for($i = 0 ; $i < 5 ; $i++ ):

				if(($tmp > 1) AND ($tmp / 10 > 1)):
					$contador_de_ceros++;
					$tmp = $tmp / 10;
				endif;		

			endfor;

			$valor = substr('00000', 0, 5-$contador_de_ceros);

			return $tipo_empresa->prefijo.$year.$valor.($contador_de_empresas+1);

        endif;


	}

}