<?php

namespace goiaba\Http\Controllers;

use goiaba\Dispositivo;
use Illuminate\Http\Request;
use goiaba\Http\Requests;
use goiaba\Http\Controllers\Controller;

class DispositivosController extends Controller
{
    protected $menu;

    public function __construct(MacController $mac)
    {
        $this->menu = $mac->menu();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Dispositivo::all();
        $menu = $this->menu;

        return view('dispositivos.index', compact('dispositivos', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = $this->menu;

        return view('dispositivos.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dispositivo::create($request->all());

        return redirect()->route('dispositivos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $menu = $this->menu;

        return view('dispositivos.edit', compact('dispositivo', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $dispositivo->update($request->all());

        return redirect()->route('dispositivos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $dispositivo->delete();

        return redirect()->route('dispositivos.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm($id)
    {
        return view('dispositivos.confirm', compact('id'));
    }
}
