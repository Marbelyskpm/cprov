<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



if(Auth::check() && Auth::user()->tipo=='administrador'):
	Route::controller('/auth','AuthController');
	Route::controller('/usuarios','UserController');
	Route::controller('/empresas', 'EmpresaController');
	Route::controller('/personas', 'PersonaController');
	Route::controller('/socios', 'SocioController');
	Route::controller('/municipios', 'MunicipioController');
	Route::controller('/servicios', 'ServicioController');
	Route::controller('/actividades', 'ActividadController');
	Route::controller('/tipoempresas', 'TipoEmpresaController');
elseif(Auth::check()):
	Route::controller('/auth','AuthController');
	Route::controller('/empresas', 'EmpresaController');
	Route::controller('/personas', 'PersonaController');
	Route::controller('/socios', 'SocioController');
	Route::controller('/municipios', 'MunicipioController');
	Route::controller('/servicios', 'ServicioController');
	Route::controller('/actividades', 'ActividadController');
	Route::controller('/tipoempresas', 'TipoEmpresaController');
endif;
	Route::controller('/auth','AuthController');
/*

cprov.ga/holamundo/index
cprov.ga/holamundo/

*/

Route::get('/', function()
{
	return View::make('hello');
});
