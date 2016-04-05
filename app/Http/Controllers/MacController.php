<?php namespace goiaba\Http\Controllers;
	use Illuminate\Foundation\Auth\User;
	use Illuminate\Support\Facades\DB;
	use goiaba\Mac;
	use goiaba\Usuarios;
	use goiaba\Dispositivo;
	use Request;

	class MacController extends Controller {
		public function lista(){
			$MAC = Mac::join('dispositivo', 'mac.id_dev', '=', 'dispositivo.id_dev')
				->join('user', 'mac.id_user', '=', 'user.id_user')
				->select('mac.mac', 'user.nome', 'mac.ticket', 'mac.ativo', 'dispositivo.descricao')
				->get();
			return view('Mac.lista')->with('MAC', $MAC)
									->with('menu', $this->menu());
			}

		public function mostra(){
			$IDMac = 800;

			$SMAC = Mac::where('id_mac', $IDMac)
				->select ('mac', 'id_user', 'id_dev', 'ticket')
				->get();

			return view('Mac.detalhe')->with('SLMAC', $SMAC);
		}

		public function novo(){
			return view('Mac.formulario')->with('menu', $this->menu());
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