<?php

class UserController extends \BaseController {

	public function getIndex(){

		$modelo = User::all();

		$array = array(
			'usuarios' => $modelo
			);

		return View::make('usuarios.index')->with($array);

	}
	public function getCreate(){

		return View::make('usuarios.create');

	}
	public function postCreate(){

		if(Input::get('password') === Input::get('password_2')):

			$usuario = new User();
			$usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');
			$usuario->usuario = Input::get('username');
			$usuario->password = Input::get('password');
			$usuario->tipo = Input::get('tipo');
			$usuario->save();

			return Redirect::to('/usuarios');

		else:

			$array = array(
				'error' => 'clave_error',
				'usuario' => Input::all()
				);
 
			return View::make('usuarios.create')->with($array);

		endif;

	}
	public function getEdit(){

	}
	public function getDelete(){

	}

}