<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     // if (Auth::attempt($credentials)) {
    //     //     $user = Auth::user();

    //     //     if ($user->hasRole('admin')) {
    //     //         return redirect()->route('admin.home');
    //     //     } else if ($user->hasRole('seler')) {
    //     //         return redirect()->route('seller.vente');
    //     //     } else {
    //     //         return redirect()->route('seller.vente');
    //     //     }
    //     // } else {
    //     //     return redirect()->route('login')->withErrors(['email' => 'Identifiants incorrects']);
    //     // }
    // }
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {

        $user = Auth::user();
        if ($user->role == 'Admin' || $user->role == 'Gerant') {
            // dd("toto");
            return '/admin/home';
        } elseif ($user->role == 'Seler') {
            //dd("bb");
            return '/seller/vente';
        } else {
            return '/user/dashboard';
        }
    }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectTo());
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
