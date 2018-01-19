<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function getAboutUsForm()
    {
        if (AboutUs::all()->isEmpty()) {
            // return the create form
            return view('admin.pages.about-us.create', ['url' => 'about_us']);
        }
        // return the editing form
        $about_us = AboutUs::all()->first();
        return view('admin.pages.about-us.edit', ['url' => 'about_us', 'about' => $about_us]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'about_us' => 'required',
            'synopsis' => 'required',
            'mission' => 'required',
            'vision' => 'required'
        ]);
        if ($request->has('id')) {
            $about = AboutUs::find($request->input('id'));
            $about->about_us = $request->input('about_us');
            $about->synopsis = $request->input('synopsis');
            $about->mission = $request->input('mission');
            $about->vision = $request->input('vision');
            $about->save();
            return back()->with('success', 'Saved about us');
        }
        AboutUs::create([
            'about_us' => $request->input('about_us'),
            'synopsis' => $request->input('synopsis'),
            'mission' => $request->input('mission'),
            'vision' => $request->input('vision'),
        ]);
        return redirect(route('admin.about'))->with('success', 'Saved about us');
    }
}
