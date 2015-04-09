<?php
class Bancos extends Eloquent {
	protected $table = 'bancos';
	protected $fillable = array('descripcion');

	public static function nuevoBanco($input) {
		$respuesta = array();

		$reglas = array(
			'descripcion' => 'required',
		);

		$validator = Validator::make($input,$reglas);

		if ($validator->fails()) {
			$respuesta['mensaje'] = $validator;
			$respuesta['error']   = true;
		}
		else {
			$bancos = static::create($input);

			$respuesta['mensaje'] = 'Banco creado!';
			$respuesta['error']   = false;
			$respuesta['data']    = $bancos;
		}

		return $respuesta;
	} 
}
?>