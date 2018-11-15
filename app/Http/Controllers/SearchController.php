<?php

namespace goiaba\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\HTTP\Request;
use App\Http\Requests;
use goiaba\Usuarios;
use input;

class SearchController extends Controller
{
    public function index()
    {
            return view('Mac.search');

    }
    public function autocomplete(Request $request)
    {
        $term=$request->term;
        $data=Usuarios::where('nome','LIKE','%'.$term.'%')
            ->take(10)
            ->get();
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id,'value'=>$value->nome];
        }
        return response()->json($result);
    }
}