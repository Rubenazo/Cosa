<?php
class ListaController extends BaseController {

	public function mostrarusuarios() {
		$usuarios = Usuarios::all();
		return View::make('usuarios.mostrar', array('usuarios' => $usuarios));
	}

	public function mostrarbancos($id) {
		$datos   = Usuarios::find($id);
		$planid  = $datos->plan_id;
		$plan    = Planes::find($planid);
		$bancos  = Bancos::all();
		$pagos   = Pagos::where('usuario_id','=',$id)->orderBy('monto','descend')->groupBy('banco_id')->get();
		return View::make('pagos.pagar', array('datos' => $datos, 'plan' => $plan, 'bancos' => $bancos, 'pagos' => $pagos));
	}

	public function seleccionar() {
		$cuentas = NumCuenta::where('banco_id','=',Input::get('bancoid'))->get();
		return Response::json(array('cuentas' => $cuentas));
	}

	public function pagar() {
		$respuesta = Pagos::nuevoPago(Input::all());
		if ($respuesta['error'] == true) {
			return Redirect::back()->witherrors($respuesta['mensaje'])->withInput();
		}
		else {
			return Redirect::back()->with('mensaje', $respuesta['mensaje']);
		} 
	}
}