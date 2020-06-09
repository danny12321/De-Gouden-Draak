<?php

namespace App\Http\Controllers;

use App\Menuitem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index()
    {
        return view('menu', [
            'menuitems' => Menuitem::with('MenuitemType')->get()
        ]);
    }
}
