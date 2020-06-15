<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuitem;

class OrderController extends Controller
{
    public function index()
    {
        return view('order', [
            'menuitems' => Menuitem::with('MenuitemType')->get()
        ]);
    }
}
