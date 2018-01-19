<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateForm()
    {
        $user = Auth::user();
        return view('site.update-user', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255'
        ]);
        $user = Auth::user();
        if ($user->email != $request->input('email')) {
            $this->validate($request, ['email' => 'unique:users']);
        }
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        if ($user->email != $request->input('email')) {
            $user->email = $request->input('email');
        }
        $user->phone = $request->input('phone');
        $user->save();
        return back()->with('success', 'Your details were updated');
    }

    public function showPasswordChangeForm()
    {
        return view('site.change-password');
    }

    public function storeNewPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
        $current_password = Auth::User()->password;
        if (Hash::check($request->input('old_password'), $current_password)) {
            $request->user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            return redirect(route('update-form'))->with('success', 'password updated successfully');
        } else {
            return back()->with('error', 'Enter the correct old (your current) password.');
        }
    }
}
