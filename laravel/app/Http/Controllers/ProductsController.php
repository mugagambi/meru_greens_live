<?php

namespace App\Http\Controllers;

use App\SubCategory;
use foo\bar;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;


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

    public function product_items($category)
    {
        if ($category == 'fruits') {
            $products = Product::where('category', 'Fruits')->paginate(8);
            return view('site.products', ['products' => $products, 'cat' => 'fruits']);
        } elseif ($category == 'vegetables') {
            $products = Product::where('category', 'Vegetables')->paginate(8);
            return view('site.products', ['products' => $products, 'cat' => 'vegetables']);
        } elseif ($category == 'others') {
            $products = Product::where('category', 'Others')->paginate(8);
            return view('site.products', ['products' => $products, 'cat' => 'others']);
        } else {
            abort(404, 'Products with that category not found');
        }
        return view('site.all-products')->with('success', 'You need to give a category on the query string');
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('site.product', ['product' => $product]);
    }

    public function getCart()
    {
        if (!\Session::has('cart')) {
            return view('site.cart', ['products' => null]);
        }
        $oldCart = \Session::get('cart');
        $cart = new Cart($oldCart);
        return view('site.cart', ['products' => $cart->items]);
    }

    public function add_to_cart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back()->with('item-added', 'Item added to cart.Continue shopping or Checkout by clicking on Shopping Cart');
    }

    public function getCheckOut()
    {
        if (!\Session::has('cart')) {
            return view('site.cart');
        }
        return view('site.checkout');
    }

    /**
     * @param Cart $item
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function removeFromCart($item)
    {
        if (!\Session::has('cart')) {
            return view('site.cart');
        }
        $oldCart = \Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->remove($item);
        \Session::put('cart', $cart);
        return redirect(route('product.shopping-cart'))->with('order-received', 'Item removed from cart successfully');
    }

    public function placeOrder(Request $request)
    {
        if (!\Session::has('cart')) {
            return view('site.cart');
        }
        $oldCart = \Session::get('cart');
        $cart = new Cart($oldCart);
        if (\Auth::check()) {
            $order = new Order();
            $order->names = \Auth::user()->first_name . ' ' . \Auth::user()->first_name;
            $order->email = \Auth::user()->email;
            $order->phone_number = \Auth::user()->phone;
            $order->county = \Auth::user()->county;
            $order->nearest_town = \Auth::user()->nearest_town;
            $order->user_id = \Auth::user()->id;
            $order->cart = serialize($cart);
            $order->save();
            \Session::forget('cart');
            return redirect(route('product.shopping-cart'))->with('order-received', 'Order received.We will get in touch soon.Thank you');
        }
        $this->validate($request, [
            'full_name' => 'required|string|max:200',
            'email' => 'nullable|email',
            'phone_number' => 'required|size:10',
            'county' => 'required|string|max:255',
            'nearest_town' => 'required|string|max:255'
        ]);
        $order = new Order();
        $order->names = $request->input('full_name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->county = $request->input('county');
        $order->nearest_town = $request->input('nearest_town');
        $order->cart = serialize($cart);
        $order->save();
        \Session::forget('cart');
        return redirect(route('product.shopping-cart'))->with('order-received', 'Order received.We will get in touch soon.Thank you');
    }

    public function emptyCart(Request $request)
    {
        if (!\Session::has('cart')) {
            return view('site.cart');
        }
        $request->session()->forget('cart');
        return back()->with('order-received', 'Cart Emptied successfully');
    }

    public function updateQty(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|integer|min:1'
        ]);
        if (!\Session::has('cart')) {
            return view('site.cart');
        }
        $oldCart = \Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->update($request->input('product_id'), $request->input('amount'));
        \Session::put('cart', $cart);
        return redirect(route('product.shopping-cart'))->with('order-received', 'Items kgs updated successfully');
    }
}
