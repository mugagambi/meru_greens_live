<?php

namespace App\Http\Controllers\Admin;

use App\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::all();
        return view('admin.pages.careers.index', ['url' => 'jobs', 'careers' => $careers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.careers.create', ['url' => 'jobs']);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'pic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'short_description' => 'required',
            'description' => 'required'
        ]);
        Career::create([
            'name' => $request->input('name'),
            'image' => $request->file('pic')->store('careers', 'public'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'application_email' => $request->input('email'),
            'open' => true
        ]);
        return redirect(route('careers.index'))->with('success', 'Vacancy added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        return view('admin.pages.careers.edit', ['url' => 'jobs', 'career' => $career]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Career $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'pic' => 'image|mimes:jpeg,png,jpg|max:2048',
            'short_description' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('pic')) {
            Storage::disk('public')->delete($career->image);
            $career->image = $request->file('pic')->store('careers', 'public');
        }
        $career->name = $request->input('name');
        $career->short_description = $request->input('short_description');
        $career->description = $request->input('description');
        $career->application_email = $request->input('email');
        $career->save();
        return redirect(route('careers.index'))->with('success', 'Vacancy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career $career
     * @throws  \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        Storage::disk('public')->delete($career->image);
        $career->delete();
        return redirect(route('careers.index'))->with('success', 'Vacancy removed successfully');
    }

    public function close(Career $career)
    {
        $career->open = false;
        $career->save();
        return redirect(route('careers.index'))->with('success', 'Vacancy closed successfully');
    }
}
