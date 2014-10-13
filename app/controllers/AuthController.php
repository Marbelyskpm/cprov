<?php

class AuthController extends \BaseController {

	public function getLogin(){

		$error =  Session::get('error');

		$array = array(
			'error' => $error
			);

		return View::make ('auth.login')->with($array); 

	}

	public function postLogin(){
		$credenciales = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);
		if(Auth::attempt($credenciales)):

			if(Auth::user()->tipo=='administrador'):

				return Redirect::to('/usuarios');

			else:

				return Redirect::to('/empresas');

			endif;

		else:

			$array = array(
				'error' => 'Usuario o clave Inválida'
				);

			return Redirect::to('/auth/login')->with($array);

		endif;
	}

	public function getLogout(){

		Auth::logout();
		return Redirect::to('/auth/login');

	}

}