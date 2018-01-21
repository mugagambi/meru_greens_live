<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.pages.services.index', ['url' => 'services', 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.services.create', ['url' => 'services']);
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
            'name' => 'required|max:50',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'synopsis' => 'required|max:200',
            'description' => 'required'
        ]);
        Service::create([
            'name' => $request->input('name'),
            'featured_image' => $request->file('featured_image')->store('services', 'public'),
            'synopsis' => $request->input('synopsis'),
            'description' => $request->input('description')
        ]);
        return redirect(route('services.index'))->with('success', 'Service added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.pages.services.edit', ['url' => 'services', 'service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'featured_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'synopsis' => 'required|max:200',
            'description' => 'required'
        ]);
        if ($request->hasFile('featured_image')) {
            \Storage::disk('public')->delete($service->featured_image);
            $service->featured_image = $request->file('featured_image')->store('services', 'public');
        }
        $service->name = $request->input('name');
        $service->synopsis = $request->input('synopsis');
        $service->description = $request->input('description');
        $service->save();
        return redirect(route('services.index'))->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service $service
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        \Storage::disk('public')->delete($service->featured_image);
        $service->delete();
        return redirect(route('services.index'))->with('success', 'removed service successfully');
    }
}
