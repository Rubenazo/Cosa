<?php
class BuscadorController extends BaseController {

	public function mostrarbuscador() {
		$zonas    = Usuarios::select('zona')->groupBy('zona')->get();
		$planes   = Planes::all();
		$usuarios = Usuarios::all();
		$bancos   = Bancos::all();
		$pagos    = Pagos::all();
		return View::make('busqueda.buscador', array('zonas' => $zonas, 'planes' => $planes, 'usuarios' => $usuarios, 'bancos' => $bancos, 'pagos' => $pagos));
	}
}