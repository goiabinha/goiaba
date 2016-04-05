<?php namespace goiaba\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use goiaba\Usuarios;
	use goiaba\Mac;
	use Request;


	class UsuariosController extends Controller {
		public function lista(){
			$usuarios = Usuarios::all();
			return view('Usuarios.lista')->with('usuarios', $usuarios)
				->with('menu', $this->menu());
		}
		public function menu(){
			$MACT = Mac::count();
			$USR = Usuarios::where('id_user','!=',0)->distinct()->count();
			$AMAC = Mac::where('ativo',1)->count();
			$IMAC = Mac::where('ativo',0)->count();
			$todos = array("MACT"=>$MACT,"USR"=>$USR,"AMAC"=>$AMAC,"IMAC"=>$IMAC);
			return $todos;
		}
}