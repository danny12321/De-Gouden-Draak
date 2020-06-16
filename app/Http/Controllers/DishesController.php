<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuitem;

class DishesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dishes', [
            'menuitems' => Menuitem::with('MenuitemType')->get()
        ]);
    }
}
