<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Table;

class OrdersController extends Controller
{
    public function store(Table $table)
    {

        $guestId = $table->lastGuest()->id;

        foreach(request('order') as $order) {
            Order::create([
                'amount' => $order['amount'],
                'description' => $order['description'],
                'menuitem_id' => $order['menuitem_id'],
                'guest_id' => $guestId,
            ]);
        }

        return 200;
    }
}
