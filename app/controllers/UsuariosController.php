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
			Mail::send('emails.usuariocreado', array('nombre'=>Input::get('nombre'),'apellido'=>Input::get('apellido')), function($message)
			{
				$message->from(Input::get('correo'), Input::get('nombre').' '.Input::get('apellido'));
				$message->to('from@exampe.com', 'Example')->subject('Nuevo Usuario Creado');
			});
			return Redirect::to('usuario')->with('mensaje', $respuesta['mensaje']);
		}
	}
}