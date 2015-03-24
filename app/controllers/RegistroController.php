<?php

class RegistroController extends BaseController {
	
	public function login() {
		$user = array(
  			'username' => Input::get('usuario'),
  			'password' => Input::get('contraseña')
		);

		if (Auth::attempt($user)) {
			return Redirect::to('/')->with('notice', 'Te has registrado exitosamente'); // NO APARECE EL MENSAJE
		}
		else {
			return Redirect::to('/')->with('error', 'El usuario o contraseña es incorrecto')->withInput();
		}
	}

	public function logout() {
		Auth::logout();
    	return Redirect::to('/')->with('notice', 'Su perfil se ha cerrado');
    }
}
?>