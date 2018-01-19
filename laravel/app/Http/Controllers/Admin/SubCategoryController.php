<?php

namespace App\Http\Controllers\Admin;

use App\SubCategory;
use App\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCategory::all();
        return view('admin.pages.sub-category.index', ['categories' => $categories, 'url' => 'sub-category']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sub-category.create', ['url' => 'sub-category']);
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
            'name' => 'required|unique:sub_categories',
            'main' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $request->file('pic');
        $input['pic'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['pic']);
        SubCategory::create([
            'name' => $request->input('name'),
            'pic' => $input['pic'],
            'category' => $request->input('main')
        ]);
        $request->session()->flash('success', 'Sub category added successfully');
        return redirect(route('sub-category.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        return view('admin.pages.sub-category.edit', ['category' => $subCategory, 'url' => 'sub-category']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_categories',
            'main' => 'required',
            'pic' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->has('pic')) {
            $image = $request->file('pic');
            $input['pic'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $input['pic']);
            Storage::delete('uploads/' . $subCategory->pic);
            $subCategory->pic = $input['pic'];
        }
        $subCategory->name = $request->input('name');
        $subCategory->category = $request->input('main');
        $subCategory->save();
        $request->session()->flash('success', 'Sub category update successfully');
        return redirect(route('sub-category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect(route('sub-category.index'))->with('success', 'Category removed successfully');
    }
}
