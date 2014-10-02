<?php

class HolaMundoController extends \BaseController {

	public function getIndex(){
		return View::make('holamundo.index');
	}

}