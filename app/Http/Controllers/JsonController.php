<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Requests;
use goiaba\Usuarios;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class JsonController extends Controller
{
    public function getLocation($query)
    {
        $data = array();
        $results = Usuarios::select('nome')
            ->where('nome', 'LIKE',  '%' . $query . '%')
            ->get();

        foreach ( $results as $result ):
            $data[] = $result->nome;
        endforeach;

        var_dump($data);
        //return \Response::json($data);
    }
}
