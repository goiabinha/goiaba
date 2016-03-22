<?php namespace goiaba\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use goiaba\Mac;
	use Request;

	class MacController extends Controller {
		public function lista(){
			$MAC = DB::select('select m.mac,u.nome, d.descricao, m.ticket, m.ativo from mac as m, user as u, dispositivo as d where m.id_user = u.id_user and m.id_dev = d.id_dev');
			$MACT = DB::select('select count(mac) as mact from mac');
			$USR = DB::select('select count(distinct(id_user)) as usr from mac goup where id_user != 0');
		    $AMAC = DB::select('select count(mac) as amac from mac where ativo = 1');
			$IMAC = DB::select('select count(mac) as imac from mac where ativo = 0');
			return view('Mac.lista')->with('MAC', $MAC)
								->with('MACT', $MACT)
								->with('USR', $USR)
								->with('AMAC', $AMAC)
								->with('IMAC', $IMAC);
			}
	}
