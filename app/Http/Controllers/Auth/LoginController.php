<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function showLoginForm()
    {
        $users = User::all();
        if(count($users)>0){
            return view('admin.user.login_form');
            // return view('auth.login');
        }else{
            $user = new User();
            $user->role = 'Admin';
            $user->name = 'Admin';
            $user->mobile = '8801837229519';
            $user->email = 'faruk952219@gmail.com';
            $user->password = Hash::make('12345678');
            $user->save();
            return view('admin.user.login_form');
        }

    }

    protected function loggedOut(Request $request)
    {
        return redirect('/home');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
