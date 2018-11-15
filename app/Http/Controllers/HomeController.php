<?php

namespace goiaba\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use goiaba\Http\Controllers\MacController;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = new MacController();
        return redirect()
            ->action('MacController@index');
    }

}