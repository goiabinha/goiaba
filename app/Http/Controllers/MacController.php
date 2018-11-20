<?php

namespace goiaba\Http\Controllers;

use goiaba\Mac;
use goiaba\Usuarios;
use goiaba\Dispositivo;
use goiaba\Http\Requests\MacRequest;
use Illuminate\Http\Request;

class MacController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function menu()
	{
		$MACT = Mac::count();
		$USR = Usuarios::where('id', '!=', 0)->distinct()->count();
		$AMAC = Mac::where('ativo', 1)->count();
		$IMAC = Mac::where('ativo', 0)->count();
		$todos = array("MACT" => $MACT, "USR" => $USR, "AMAC" => $AMAC, "IMAC" => $IMAC);

		return $todos;
	}

	public function autocomplete(Request $request)
	{
		$term = $request->term;
		$data = Usuarios::where('nome','LIKE','%'.$term.'%')->take(10)->get();
		$result = array();
		foreach ($data as $key => $value) {
			$result[]=['id'=>$value->id,'value'=>$value->nome];
		}

		return response()->json($result);
	}

	public function index()
	{
		$macs = Mac::all();
		$menu = $this->menu();

		return view('Mac.index', compact('macs','menu'));
	}

    public function create()
    {
        $dev = Dispositivo::all();
        $menu = $this->menu();

        return view('Mac.create', compact('dev','menu'));
    }

    public function store(MacRequest $request)
    {
        $request['ativo'] ? $request['ativo'] = 1 : $request['ativo'] = 0;
        Mac::create($request->all());

       return redirect()->route('macs.index');
    }

    public function show($id)
    {
        $mac = Mac::findOrFail($id);
        $menu = $this->menu();

        return view('Mac.show', compact('mac','menu'));
    }

    public function edit($id)
    {
        $mac = Mac::findOrFail($id);
        $dev = Dispositivo::all();
        $menu = $this->menu();

        return view('Mac.edit', compact('mac','menu','dev'));
    }

    public function update(MacRequest $request, $id)
    {
        $mac = Mac::findOrFail($id);
        $request['ativo'] ? $request['ativo'] = 1 : $request['ativo'] = 0;
        $mac->update($request->all());

        return redirect()->route('macs.show', $mac->id);
    }

    public function destroy($id)
    {
        $mac = Mac::findOrFail($id);
        try {
            $mac->delete();
            flash("Mac $mac->mac excluído com sucesso!")->success();
            return redirect()->route('macs.index');
        } catch (QueryException $e) {
            flash($e->getMessage())->error();
            return redirect()->route('macs.index');
        }
    }

    public function confirm($id)
    {
        return view('Mac.confirm', compact('id'));
    }
}
