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
			$MACT = Mac::count();
			$USR = Usuarios::where('id_user','!=',0)->distinct()->count();
			$AMAC = Mac::where('ativo',1)->count();
			$IMAC = Mac::where('ativo',0)->count();
			return view('Mac.lista')->with('MAC', $MAC)
								->with('MACT', $MACT)
								->with('USR', $USR)
								->with('AMAC', $AMAC)
								->with('IMAC', $IMAC);
			}

		public function mostra(){
			return view('Mac.detalhe');
		}
	}