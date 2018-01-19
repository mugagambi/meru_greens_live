<?php

namespace App\Http\Controllers\Admin;

use App\Couresel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CoureselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Couresel::all();
        return view('admin.pages.slider.index', ['sliders' => $sliders, 'url' => 'slider']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.create', ['url' => 'slider']);
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:15',
            'short_synopsis' => 'required|max:100'
        ]);
        $image = $request->file('image');
        $input['image'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $img = Image::make($image->getRealPath());
        $img->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . '/' . $input['image']);
        if (Couresel::count() >= 3) {
            $request->session()->flash('error', 'Can\'t add new item.There can only be 3 items');
            return redirect(route('slider.index'));
        }
        Couresel::create([
            'image' => $input['image'],
            'title' => $request->input('title'),
            'short_synopsis' => $request->input('short_synopsis')
        ]);
        $request->session()->flash('success', 'Slider Item added successfully');
        return redirect(route('slider.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Couresel $couresel
     * @return \Illuminate\Http\Response
     */
    public function edit($couresel)
    {
        $couresel = Couresel::find($couresel);
        return view('admin.pages.slider.edit', ['slider' => $couresel, 'url' => 'slider']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $couresel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $couresel)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'short_synopsis' => 'required'
        ]);
        $slider = Couresel::find($couresel);
        if ($request->has('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $img = Image::make($image->getRealPath());
            $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationPath . '/' . $input['image']);
            Storage::delete('uploads/' . $slider->image);
            $slider->image = $input['image'];
        }
        $slider->title = $request->input('title');
        $slider->short_synopsis = $request->input('short_synopsis');
        $slider->save();
        return redirect(route('slider.index'))->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Couresel $couresel
     * @return \Illuminate\Http\Response
     */
    public function destroy($couresel)
    {
        $couresel = Couresel::find($couresel);
        $couresel->delete();
        return redirect(route('slider.index'))->with('success', 'Item removed successfully');
    }
}
