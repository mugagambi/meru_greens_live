<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderRequestClient;
use App\Mail\OrderRequestAdmin;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    public function all_products()
    {
        $fruits = SubCategory::where('category', 'Fruits')
            ->limit(6)->get();
        $vegs = SubCategory::where('category', 'Vegetables')
            ->limit(6)->get();
        $other = SubCategory::where('category', 'Others')
            ->limit(6)->get();
        return view('site.all-products', ['fruits' => $fruits, 'vegs' => $vegs, 'others' => $other]);
    }

    public function fruits()
    {
        $sub = SubCategory::where('category', 'Fruits')->get();
        return view('site.fruits', ['subs' => $sub, 'url' => 'products']);
    }

    public function vegs()
    {
        $sub = SubCategory::where('category', 'Vegetables')->get();
        return view('site.vegs', ['subs' => $sub]);
    }
    public function others()
    {
        $sub = SubCategory::where('category', 'Others')->get();
        return view('site.others', ['subs' => $sub, 'url' => 'products']);
    }

    public function fruit_product($product)
    {
        $product = Product::find($product);
        return view('site.products', ['url' => 'products', 'product' => $product]);
    }

    public function product_items(Request $request)
    {
        if ($request->filled('category')) {
            $cat = SubCategory::where('name', $request->query('category'))->first();
            return view('site.products', ['cat' => $cat]);
        }
        return view('site.all-products')->with('success', 'You need to give a category on the query string');
    }

    public function product($product_id)
    {
        $product = Product::find($product_id);
        return view('site.product', ['product' => $product]);
    }

    public function shopping_cart()
    {
        $cart = Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('site.cart', ['cart' => $cart]);
    }

    public function add_to_cart(Request $request)
    {
        $product_id = $request->query('product');
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
            'quantity' => 1,
            'added_on' => Carbon::now()
        ]);
        return redirect(route('cart'));
    }

    /**
     * @param Cart $item
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove_from_cart(Cart $item)
    {
        $item->delete();
        return redirect(route('cart'))->with('success', 'Item removed from cart');
    }

    public function confirm_order()
    {
        $cart = Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        return view('site.order-confirmation', ['user' => $user, 'cart' => $cart]);
    }

    public function placeOrder(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $order_items = collect($cart)->transform(function ($item) {
            return new OrderItem(['quantity' => $item->quantity, 'product_id' => $item->product_id]);
        });
        $order = Order::create(['user_id' => Auth::id(), 'processed' => false]);
        $order->items()->saveMany($order_items);
        Mail::to($request->user())->send(new OrderRequestClient($order));
        Mail::to('hmugambi1@gmail.com')->send(new OrderRequestAdmin($order)); // TODO eneter admin email
        Cart::where('user_id', Auth::id())->delete();
        return redirect(route('cart'))->with('success', 'Order received.We will get in touch soon.Thank you');
    }
}
