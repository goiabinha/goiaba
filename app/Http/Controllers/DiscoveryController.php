<?php namespace goiaba\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use goiaba\Http\Controllers\MacController;
use goiaba\Discovery;

class DiscoveryController extends Controller
{
    public function lista()
    {
        $DSC = Discovery::all();
        $menu = new MacController();
        return view('Discovery.lista')->with('DSC', $DSC)
            ->with('menu', $menu->menu());
    }
 }
