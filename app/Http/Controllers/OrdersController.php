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

            if(!array_key_exists('description', $order)) {
                $order['description'] = null;
            }

            Order::create([
                'amount' => $order['amount'],
                'description' => $order['description'],
                'menuitem_id' => $order['menuitem_id'],
                'guest_id' => $guestId,
            ]);

            foreach($order['extraOrder'] as $extraOrder) {
                Order::create([
                    'amount' => $order['amount'],
                    'description' => null,
                    'menuitem_id' => $extraOrder['menuitem_id'],
                    'guest_id' => $guestId,
                ]);
            }
        }

        return 200;
    }
}
