<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\SubCategory;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $orders_count = Order::all()->count();
        $products_count = Product::all()->count();
        $total_subs = SubCategory::all()->count();
        $total_users = User::all()->count();
        $latest_products = Product::orderBy('created_at', 'desc')->limit(5)->get();
        $latest_users = User::orderBy('created_at', 'desc')->limit(8)->get();
        $unread_messages = Contact::where('read', 'false')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $orders = Order::orderBy('created_at', 'desc')->limit(5)->get();
        $url = 'dashboards';
        return view('admin.pages.dashboard', ['url' => $url, 'orders_count' => $orders_count,
            'products_count' => $products_count, 'total_subs' => $total_subs, 'total_users' => $total_users,
            'latest_products' => $latest_products, 'latest_users' => $latest_users,
            'unread_messages' => $unread_messages, 'orders' => $orders]);
    }
}
