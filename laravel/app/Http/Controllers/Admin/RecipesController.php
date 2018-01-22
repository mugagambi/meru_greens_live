<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\Product;
use App\Ingredient;
use App\Procedure;
use App\RecipeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.pages.recipes.index', ['recipes' => $recipes, 'url' => 'recipes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.pages.recipes.create', ['url' => 'recipes', 'products' => $products]);
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
            'product_id' => 'required',
            'ingredient' => 'required',
            'ingredient.*' => 'string|max:255',
            'procedure' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'ingredient.required' => 'You need at least one ingredient',
            'ingredient.*.string' => 'Ingredient must be a string',
            'ingredient.*.max' => 'Ingredient name must be maximum of 255 characters',
            'procedure.required' => 'You need at least one Procedure'
        ]);
        if (!$request->has('images')) {
            return back()->with('error', 'You need at least one recipe image');
        }
        $ingredients = collect($request->ingredient)->transform(function ($ingredient) {
            return new Ingredient(['name' => $ingredient]);
        });
        $procedures = collect($request->procedure)->transform(function ($procedure) {
            return new Procedure(['procedure' => $procedure]);
        });
        $images = collect($request->images)->transform(function ($image) {
            $image_path = $image->store('recipes', 'public');
            return new RecipeImage(['image' => $image_path]);
        });
        $recipe = Recipe::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'product_id' => $request->input('product_id'),
            'featured_image' => $request->file('image')->store('recipes', 'public')
        ]);
        $recipe->ingredients()->saveMany($ingredients);
        $recipe->images()->saveMany($images);
        $request->session()->flash('success', 'Recipe added successfully');
        return redirect(route('recipes.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $products = Product::all();
        return view('admin.pages.recipes.edit', ['recipe' => $recipe, 'products' => $products, 'url' => 'recipes']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'product_id' => 'required',
            'ingredient' => 'required',
            'ingredient.*' => 'string|max:255',
            'procedure' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'image|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'ingredient.required' => 'You need at least one ingredient',
            'ingredient.*.string' => 'Ingredient must be a stirng',
            'ingredient.*.max' => 'Ingredient name must be maximum of 255 characters',
            'procedure.required' => 'You need at least one Procedure'
        ]);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($recipe->image);
            $recipe->featured_image = $request->file('image')->store('recipes', 'public');
        }
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->product_id = $request->input('product_id');
        $recipe->save();
        $recipe->ingredients()->delete();
        $ingredients = collect($request->ingredient)->transform(function ($ingredient) {
            return new Ingredient(['name' => $ingredient]);
        });
        $recipe->ingredients()->saveMany($ingredients);
        $recipe->procedures()->delete();
        $procedures = collect($request->procedure)->transform(function ($procedure) {
            return new Procedure(['procedure' => $procedure]);
        });
        $recipe->procedures()->saveMany($procedures);
        $images = collect($request->images)->transform(function ($image) {
            $image_path = $image->store('recipes', 'public');
            return new RecipeImage(['image' => $image_path]);
        });
        $recipe->images()->saveMany($images);
        $request->session()->flash('success', 'Recipe updated successfully');
        return redirect(route('recipes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe $recipe
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        foreach ($recipe->images as $image) {
            Storage::disk('public')->delete($image->image);
        }
        Storage::disk('public')->delete($recipe->featured_image);
        $recipe->delete();
        return redirect(route('recipes.index'))->with('success', 'Recipe removed successfully');
    }

    public function destroyImage($recipe, $image)
    {
        $image = RecipeImage::find($image);
        Storage::disk('public')->delete($image->image);
        $image->delete();
        return redirect(route('recipes.edit', ['recipe' => $recipe]))->with('success', 'Image removed
        successfully');
    }
}
