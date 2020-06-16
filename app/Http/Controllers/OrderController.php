<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use App\Menuitem;
use App\Order;
use App\Orderline;

class OrderController extends Controller
{
    public function index()
    {
        return view('order', [
            'menuitems' => Menuitem::with('MenuitemType')->get()
        ]);
    }

    public function store()
    {
        $data = $this->validateOrder();

        $guest = Guest::create([
            'name' => $data['name']
        ]);

        $order = Order::create([
            'guest_id' => $guest->id
        ]);

        foreach ($data['order'] as $orderline) {
            if (!array_key_exists('description', $orderline)) {
                $orderline['description'] = null;
            }

            Orderline::create([
                'amount' => $orderline['amount'],
                'description' => $orderline['description'],
                'menuitem_id' => $orderline['menuitem_id'],
                'order_id' => $order->id,
            ]);

            foreach($orderline['extraOrder'] as $extraOrder) {
                Orderline::create([
                    'amount' => $orderline['amount'],
                    'description' => null,
                    'menuitem_id' => $extraOrder['menuitem_id'],
                    'order_id' => $order->id,
                ]);
            }
        }

        return $order->id;
    }

    public function show(Order $order)
    {

        return view('ordershow', [
            'order' => $order,
        ]);
    }

    protected function validateOrder()
    {
        return request()->validate([
            'name' => ['required'],
            'order' => ['required'],
        ]);
    }
}
