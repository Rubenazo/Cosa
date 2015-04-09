<?php 
class BancosController extends BaseController {
	
	public function formubanco() {
		$bancos = Bancos::all();
		return View::make('bancos.crear', array('bancos' => $bancos));
	}

	public function crearbanco() {
		$respuesta = Bancos::nuevoBanco(Input::all());
		if ($respuesta['error'] == true) {
			return Redirect::to('banco')->witherrors($respuesta['mensaje'])->withInput();
		}
		else {
			return Redirect::to('banco')->with('mensaje', $respuesta['mensaje']);
		}
	}

	public function crearcuenta() {
		$respuesta = NumCuenta::nuevaCuenta(Input::all());
		if ($respuesta['error'] == true) {
			return Redirect::to('banco')->witherrors($respuesta['mensaje'])->withInput();
		}
		else {
			return Redirect::to('banco')->with('mensaje', $respuesta['mensaje']);
		}
	}


}