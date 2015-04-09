<?php
class Usuarios extends Eloquent {
	protected $table    = 'usuarios';
	protected $fillable = array('nombre','apellido','correo','zona','plan_id','fecha_corte');

	public static function nuevoUsuario($input) {
		$respuesta = array();

		$reglas = array(
			'nombre'      => 'required',
			'apellido'    => 'required',
			'correo'      => 'required | email',
			'zona'        => 'required',
			'fecha_corte' => 'required'
		);

		$validator = Validator::make($input,$reglas);

		if ($validator->fails()) {
			$respuesta['mensaje'] = $validator;
			$respuesta['error']   = true;
		}
		else {
			$usuarios = static::create($input);

			$respuesta['mensaje'] = 'Usuario creado!';
			$respuesta['error']   = false;
			$respuesta['data']    = $usuarios;
		}

		return $respuesta;
	} 
}
?>