<?php
class ListabanController extends BaseController {

	public function mostrarbancos() {
		$bancos = Bancos::all();
		return View::make('bancos.mostrar', array('bancos' => $bancos));
	}

	public function mostrarpagos($id) {
		$datos   = Bancos::find($id);
		$usuarios = Usuarios::all();
		$pagos   = Pagos::select('usuario_id', DB::raw('SUM(monto) as total'))->where('banco_id','=',$id)->orderBy('monto','desc')->groupBy('usuario_id')->get();
		return View::make('pagos.pagarban', array('datos' => $datos, 'usuarios' => $usuarios, 'pagos' => $pagos));
	}
}
