<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuitem;
use App\Table;
use App\Order;
use App\Orderline;

class TabletController extends Controller
{
    public function index(Table $table)
    {
        $guestId = $table->lastGuest()->id;

        $orders = Order::where('guest_id', '=', $guestId)->with('orderlines.menuitem')->orderBy('created_at', 'desc')->get();

        return view('tablet', [
            'menuitems' => Menuitem::with('MenuitemType')->get(),
            'table' => $table,
            'orders' => $orders,
        ]);
    }

    public function newguest(Table $table)
    {
        return view('newguest', [
            'table' => $table,
        ]);
    }

    public function store(Table $table)
    {
        $guestId = $table->lastGuest()->id;

        $lastOrder = Order::where('guest_id', '=', $guestId)->orderBy('created_at', 'desc')->limit(1)->first();

        if(!is_null($lastOrder)) {
            $date_now = new \DateTime();
            $date_now->modify("-10 minutes");
    
            $lastOrderDate = new \DateTime($lastOrder->created_at);
           
            if ($lastOrderDate > $date_now) {
                return response('Error', 429);
            } 
        }

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
