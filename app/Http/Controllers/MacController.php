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

		public function lista()
		{
			$MAC = Mac::join('dispositivo', 'mac.id_dev', '=', 'dispositivo.id_dev')
				->join('user', 'mac.id_user', '=', 'user.id_user')
				->select('mac.id', 'mac.mac', 'user.nome', 'mac.id_user', 'mac.ticket', 'mac.ativo', 'mac.id_dev', 'dispositivo.descricao', 'mac.nome_eq' )
				->get();
			return view('Mac.lista')->with('MAC', $MAC)
				->with('menu', $this->menu());
		}

		public function detalhe($id)
		{
			$detalhe = Mac::join('dispositivo', 'mac.id_dev', '=', 'dispositivo.id_dev')
				->join('user', 'mac.id_user', '=', 'user.id_user')
				->where('id', $id)
				->select('mac.mac', 'user.nome', 'mac.ticket', 'mac.ativo', 'dispositivo.descricao', 'mac.nome_eq', 'mac.criado_em', 'mac.modificado_em' )
				->get();

			foreach( $detalhe as $D ){
				$detalhes=array ( "mac"=>$D->mac,
					"nome"=>$D->nome,
					"ticket"=>$D->ticket,
					"ativo"=>$D->ativo,
					"descricao"=>$D->descricao,
					"nome_eq"=>$D->nome_eq,
					"modificado"=>$D->modificado_em,
					"criado"=>$D->criado_em );
			}
			/*return response()->json($MAC);*/
			return view('Mac.detalhe')
				->with('menu', $this->menu())
				->with('DTL', $detalhes);


			$IDMac = 800;

			$SMAC = Mac::where('id_mac', $IDMac)
				->select('mac', 'id_user', 'id_dev', 'ticket')
				->get();

			return view('Mac.detalhe')->with('SLMAC', $SMAC);
		}

		public function novo($mac='')
		{
			$dev = Dispositivo::all();
			return view('Mac.formulario')
				->with('menu', $this->menu())
				->with('dev', $dev)
				->with('mac', $mac);
		}

		public function adiciona(MacRequest $request)
		{
	        Mac::create($request->all());
			return view('Mac.concluido')
				->with('menu', $this->menu());
		}

		public function excluir($id)
		{
			$mac = Mac::find($id);
			$mac->delete();
			return redirect()
				->action('MacController@lista');
		}

		public function editar($M)
		{
			$MAC = Mac::join('dispositivo', 'mac.id_dev', '=', 'dispositivo.id_dev')
				->join('user', 'mac.id_user', '=', 'user.id_user')
				->where('id', $M)
				->select('mac.id', 'mac.mac', 'user.nome', 'mac.id_user', 'mac.ticket', 'mac.ativo', 'mac.id_dev', 'dispositivo.descricao', 'mac.nome_eq' )
				->get();

			$dev = Dispositivo::all();
			foreach( $MAC as $E ){
				$EMAC=array ( "id"=>$E->id,
					"mac"=>$E->mac,
					"nome"=>$E->nome,
					"id_user"=>$E->id_user,
					"ticket"=>$E->ticket,
					"ativo"=>$E->ativo,
					"id_dev"=>$E->id_dev,
					"descricao"=>$E->descricao,
					"nome_eq"=>$E->nome_eq );
			}

			/*return response()->json($MAC);*/

			return view('Mac.editar')
				->with('menu', $this->menu())
				->with('dev', $dev)
				->with('MAC', $MAC)
			    ->with('EMAC', $EMAC);
		}

		public function altera(MacRequest $request)
		{
			$id = $request->id;
			$input = $request->except('id','_token');
			Mac::find($id)->update($input);

			return redirect("macs/detalhe/".$id."")
				->with('menu', $this->menu());
		}
		
		/*
		* Testar novo metodo altera
		* Editar a rota
		* Route::get('/macs/altera/{id}', 'MacController@altera');
		* Editar o formulário
		* <form role="form" action="{{URL('macs/altera/$EMAC["id"]')}}">
		* Comentar a linha 22 do formulario
		* <-- <input type="hidden" name="id" class="form-control" id="id" value="{{ $EMAC["id"] }}"> -->
		
		public function altera(MacRequest $request, $id)
		{
			Mac::find($id)->update($request->all());

			return redirect("macs/detalhe/".$id."")->with('menu', $this->menu());
		}
		*/
	}
