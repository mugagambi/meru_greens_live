<?php

namespace App\Http\Controllers;

use App\Product;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('product')) {
            $product = Product::findOrFail($request->query('product'));
            return view('site.recipes', ['product' => $product]);
        }
        return abort(404);
    }

    public function recipe(Recipe $recipe)
    {
        return view('site.recipe', ['recipe' => $recipe]);
    }
}
