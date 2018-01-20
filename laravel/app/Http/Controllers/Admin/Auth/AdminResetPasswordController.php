<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AdminResetPasswordController extends Controller
{
    protected $redirectTo = '/administrator/dashboard';
    use ResetsPasswords;

    //Show form to seller where they can reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.pages.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('admins');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
