<?php 
class UsuariosController extends BaseController {
	
	public function formusuario() {
		$planes = Planes::all();
		return View::make('usuarios.crear', array('planes' => $planes));
	}

	public function crearusuario() {
		$respuesta = Usuarios::nuevoUsuario(Input::all());
		if ($respuesta['error'] == true) {
			return Redirect::to('usuario')->witherrors($respuesta['mensaje'])->withInput();
		}
		else {
			return Redirect::to('usuario')->with('mensaje', $respuesta['mensaje']);
		}
	}
}