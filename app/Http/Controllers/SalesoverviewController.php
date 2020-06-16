<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class SalesoverviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('salesoverview', [
            'sales' => Order::all()
        ]);
    }
}
