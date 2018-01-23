<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.pages.orders.index', ['url' => 'orders', 'orders' => $orders]);
    }

    public function show(Order $order)
    {
        $order->seen = 1;
        $order->save();
        $items = unserialize($order->cart);
        return view('admin.pages.orders.show', ['url' => 'orders', 'order' => $order, 'items' => $items]);
    }
}
