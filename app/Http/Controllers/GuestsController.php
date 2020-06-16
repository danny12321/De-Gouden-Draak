<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Table;

class GuestsController extends Controller
{
    public function store(Table $table) 
    {
        Guest::create([
            'table_id' => $table['id']
        ]);

        return Table::with('latestGuest')->get();
    }

    public function store_tablet(Table $table) 
    {
        Guest::create([
            'table_id' => $table['id']
        ]);

        return redirect()->back();
    }
}
