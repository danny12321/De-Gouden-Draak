<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderline;
use App\Order;
use App\Table;

class OrdersController extends Controller
{
    public function store(Table $table)
    {
        $guestId = $table->lastGuest()->id;

        $order = Order::create([
            'guest_id' => $guestId,
        ]);

        foreach(request('order') as $orderrequest) {

            if(!array_key_exists('description', $orderrequest)) {
                $orderrequest['description'] = null;
            }

            Orderline::create([
                'amount' => $orderrequest['amount'],
                'description' => $orderrequest['description'],
                'menuitem_id' => $orderrequest['menuitem_id'],
                'order_id' => $order->id,
            ]);

            foreach($orderrequest['extraOrder'] as $extraOrder) {
                Orderline::create([
                    'amount' => $orderrequest['amount'],
                    'description' => null,
                    'menuitem_id' => $extraOrder['menuitem_id'],
                    'order_id' => $order->id,
                ]);
            }
        }

        return 200;
    }
}
