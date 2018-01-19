<?php

namespace App\Http\Controllers\Admin\Auth;

use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = 'administrator/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        if (auth()->guard('admin')->user()) return redirect()->route('admin.dashboard');
        return view('admin.pages.login');
    }

    public function submitLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'),
            'password' => $request->input('password')], $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect(route('admin.login'))->with('error', 'Log in failed!<br//> Your email or password is wrong.<br//>Please try again');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        \Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect(route('admin.login'));
    }
}
