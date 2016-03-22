<?php namespace goiaba\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use goiaba\Usuarios;
	use Request;


	class UsuariosController extends Controller {
		public function lista(){
			$usuarios = Usuarios::all();
			return view('Usuarios.lista')->with('usuarios', $usuarios);
	}
}