<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        $url = 'admins';
        return view('admin.pages.admins.index', ['admins' => $admins, 'url' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.admins.create', ['url' => 'admins']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdminsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminsRequest $request)
    {
        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'pic' => $request->file('pic')->store('admins', 'public'),
            'job_title' => $request->input('job_title'),
        ]);
        $request->session()->flash('success', 'Admin added successfully');
        return redirect(route('admins.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.pages.admins.edit', ['admin' => $admin, 'url' => 'admins']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        if ($request->input('email') == $admin->email) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'job_title' => 'required',
                'email' => 'email',
                'pic' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|unique:admins|email',
                'job_title' => 'required',
                'pic' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
        }
        if ($request->hasFile('pic')) {
            Storage::disk('public')->delete($admin->pic);
            $admin->pic = $request->file('pic')->store('admins', 'public');
        }
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->job_title = $request->input('job_title');
        $admin->save();
        $request->session()->flash('success', 'Admin updated successfully');
        return redirect(route('admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Admin $admin)
    {
        Storage::disk('public')->delete($admin->pic);
        $admin->delete();
        return redirect(route('admins.index'))->with('success', 'Admin removed successfully');
    }
}
