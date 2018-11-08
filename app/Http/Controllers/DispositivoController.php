<?php

namespace goiaba\Http\Controllers;

use Illuminate\Http\Request;
use goiaba\Http\Requests;
use goiaba\Http\Controllers\Controller;

class DispositivoController extends Controller
{
    protected $menu;

    public function __construct(MacController $mac)
    {
        $this->menu = $mac->menu();
        $this->middleware('auth');
    }
}
