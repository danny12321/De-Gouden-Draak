<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today()->toDateString();
        return view('home', [
            'sales' => Sales::whereDate('end_date', '>', $today)->whereDate('start_date', '<', $today)->get()
        ]);
    }
}
