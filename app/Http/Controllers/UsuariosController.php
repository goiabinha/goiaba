<?php namespace goiaba\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use goiaba\Usuarios;
	use goiaba\Mac;
	use goiaba\Http\Controllers\MacController;
	use Request;


	class UsuariosController extends Controller
	{
		public function lista()
		{
			$usuarios = Usuarios::all();
			$menu = new MacController();
			return view('Usuarios.lista')->with('usuarios', $usuarios)
				->with('menu', $menu->menu());
		}
	}