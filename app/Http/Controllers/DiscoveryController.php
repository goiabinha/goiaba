<?php

namespace goiaba\Http\Controllers;

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
