<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();
        return view('admin.pages.orders.index', ['url' => 'orders', 'orders' => $orders]);
    }

    public function show(Order $order)
    {
        return view('admin.pages.orders.show', ['url' => 'orders', 'order' => $order]);
    }
}
