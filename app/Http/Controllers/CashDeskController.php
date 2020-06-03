<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuitem;
use App\Table;

class CashDeskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cashdesk', [
                'menuitems' => Menuitem::with('MenuitemType')->get(),
                'tables' => Table::with('latestGuest')->get(),
            ]
        );
    }
}
