<?php namespace goiaba\Http\Controllers;
	use Illuminate\Foundation\Auth\User;
	use Illuminate\Support\Facades\DB;
	use goiaba\Mac;
	use goiaba\Usuarios;
	use goiaba\Dispositivo;
	use Illuminate\HTTP\Request;
	use App\Http\Requests;
	use goiaba\Http\Requests\MacRequest;
	use input;

	class MacController extends Controller
	{
		public function lista()
		{
			$MAC = Mac::join('dispositivo', 'mac.id_dev', '=', 'dispositivo.id_dev')
				->join('user', 'mac.id_user', '=', 'user.id_user')
				->select('mac.mac', 'user.nome', 'mac.ticket', 'mac.ativo', 'dispositivo.descricao')
				->get();
			return view('Mac.lista')->with('MAC', $MAC)
				->with('menu', $this->menu());
		}

		public function mostra()
		{
			$IDMac = 800;

			$SMAC = Mac::where('id_mac', $IDMac)
				->select('mac', 'id_user', 'id_dev', 'ticket')
				->get();

			return view('Mac.detalhe')->with('SLMAC', $SMAC);
		}

		public function novo()
		{
			$dev = Dispositivo::all();
			return view('Mac.formulario')->with('menu', $this->menu())
				->with('dev', $dev);
		}

		public function menu()
		{
			$MACT = Mac::count();
			$USR = Usuarios::where('id_user', '!=', 0)->distinct()->count();
			$AMAC = Mac::where('ativo', 1)->count();
			$IMAC = Mac::where('ativo', 0)->count();
			$todos = array("MACT" => $MACT, "USR" => $USR, "AMAC" => $AMAC, "IMAC" => $IMAC);
			return $todos;
		}

		public function autocomplete(Request $request)
		{
			$term=$request->term;
			$data=Usuarios::where('nome','LIKE','%'.$term.'%')
				->take(10)
				->get();
			$result=array();
			foreach ($data as $key => $value) {
				$result[]=['id'=>$value->id_user,'value'=>$value->nome];
			}
			return response()->json($result);
		}

		public function adiciona(MacRequest $request)
		{
			$mac = $request->mac;
			$id_user = $request->id_user;
			$ticket = $request->ticket;
			$dispositivo = $request->id_dev;
			$descricao = $request->nome_eq;
			$ativo = $request->ativo;
			return implode( ',', array($mac,$id_user,$ticket,$dispositivo,$descricao,$ativo));
		}


	}
