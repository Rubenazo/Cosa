<?php
class NumCuenta extends Eloquent {
	protected $table = 'num_cuenta';
	protected $fillable = array('banco_id','numero','tipo');

	public static function nuevaCuenta($input) {
		$respuesta = array();

		$reglas = array(
			'banco_id' => 'required',
			'numero'   => 'required | numeric',
			'tipo'     => 'required'
		);

		$validator = Validator::make($input,$reglas);

		if ($validator->fails()) {
			$respuesta['mensaje'] = $validator;
			$respuesta['error']   = true;
		}
		else {
			$cuentas = static::create($input);

			$respuesta['mensaje'] = 'Cuenta creada!';
			$respuesta['error']   = false;
			$respuesta['data']    = $cuentas;
		}

		return $respuesta;
	} 
}
?>