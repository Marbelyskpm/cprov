<?php

class UserController extends \BaseController {

	protected $route = '/usuarios';

	public function getIndex(){

		$modelo = User::all();

		$array = array(
			'usuarios' => $modelo,
			'route' => $this->route
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
			$usuario->username = Input::get('username');
			$usuario->password = Hash::make(Input::get('password'));
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
	
	public function getEdit( $id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$usuario = User::find($id);

			$array = array(
				'usuario' => $usuario,
				'route' => $this->route
				);

			return View::make('usuarios.edit')->with($array);

		else:

			return Redirect::to($this->route);

		endif;

	}

	
	public function postEdit( $id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$usuario = User::find($id);

			if( Input::get('password') != '' ):
				
				if( Input::get('password') == Input::get('password_2')):
				
					$usuario->password = Hash::make(Input::get('password'));
				
				else:

					$array = array(
						'error' => 'clave_error',
						'route' => $this->route,
						'usuario' => $usuario
						);
		 
					return View::make('usuarios.edit')->with($array);
				
				endif;
			
			endif;

			$usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');

			$usuario->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

	}

	public function getDelete( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$usuario = User::find($id);

			$array = array(
				'usuario' => $usuario,
				'route' => $this->route
				);	

			return View::make('usuarios.delete')->with( $array );

		else:

			return Redirect::to($this->route);
		endif;
	}
   
   public function postDelete($id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$usuario = User::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;


   }
}