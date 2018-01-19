<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\SubCategory;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCategory::all();
        $products = Product::all();
        return view('admin.pages.products.index', ['products' => $products, 'url' => 'products',
            'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SubCategory::all();
        return view('admin.pages.products.create', ['url' => 'products', 'categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'pic.*' => 'image|mimes:jpg,jpeg,png'
        ]);
        if (!$request->has('pic')) {
            return back()->with('error', 'You need at least one image');
        }
        $images = collect($request->pic)->transform(function ($pic) {
            $image = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)),
                    0, 5) . '_' . $pic->getClientOriginalName();
            $destinationPath = public_path('/uploads');
            $pic->move($destinationPath, $image);
            return new ProductImage(['image' => $image]);
        });
        $data = $request->except('pic');
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'subcategory_id' => $data['category']
        ]);
        $product->images()->saveMany($images);
        $request->session()->flash('success', 'Product added successfully');
        return redirect(route('products.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = SubCategory::all();
        return view('admin.pages.products.edit', ['product' => $product, 'url' => 'products',
            'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'pic.*' => 'image|mimes:jpg,jpeg,png'
        ]);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->subcategory_id = $request->input('category');
        $product->save();
        if ($request->has('pic')) {
            $images = collect($request->pic)->transform(function ($pic) {
                $image = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)),
                        0, 5) . '_' . $pic->getClientOriginalName();
                $destinationPath = public_path('/uploads');
                $pic->move($destinationPath, $image);
                return new ProductImage(['image' => $image]);
            });
            $product->images()->saveMany($images);
        }
        $request->session()->flash('success', 'Product updated successfully');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product removed successfully');
    }

    public function destroyImage($product, $image)
    {
        $image = ProductImage::find($image);
        Storage::delete('uploads/' . $image->image);
        $image->delete();
        return redirect(route('products.edit', ['product' => $product]))->with('success', 'Image removed
        successfully');
    }
}
