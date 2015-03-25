<?php
class Pagos extends Eloquent {
	protected $table    = 'pagos';
	protected $fillable = array('transferencia','monto','usuario_id','plan_id','bantrans_id','banco_id','num_cuenta_id');

	public static function nuevoPago($input) {
		$respuesta = array();

		$reglas = array(
			'transferencia'   => 'required',
			'monto' => 'required',
			'bantrans_id' => 'required',
			'banco_id'   => 'required',
		);

		$validator = Validator::make($input,$reglas);

		if ($validator->fails()) {
			$respuesta['mensaje'] = $validator;
			$respuesta['error']   = true;
		}
		else {
			$pagos = static::create($input);

			$respuesta['mensaje'] = 'Pago almacenado!';
			$respuesta['error']   = false;
			$respuesta['data']    = $pagos;
		}

		return $respuesta;
	} 
}
?>