<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Terms;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/shopping-cart';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle social login request
     * @param $social
     * @return \Response
     */
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from social login
     * @param $social
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function handleProviderCallback($social)

    {

        $userSocial = Socialite::driver($social)->stateless()->user();

        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if ($user) {

            Auth::login($user);

            return redirect()->action('IndexController@index');

        } else {
            $name = trim($userSocial->getName());
            $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $first_name = trim(preg_replace('#' . $last_name . '#', '', $name));
            $terms = Terms::all()->first();
            return view('auth.register', ['first_name' => $first_name, 'last_name' => $last_name,
                'terms' => $terms, 'email' => $userSocial->getEmail()]);

        }

    }
}
