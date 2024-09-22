<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

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
     * @var string
     */

     protected $redirectTo = '/home';

    public function showLoginForm()
{
    return view('auth.login');
}
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Validate email and password
    $validator = Validator::make($credentials, [
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator->errors());
    }

    if (Auth::attempt($credentials, $request->has('remember_me'))) {
        $request->session()->regenerate(); 
        return redirect()->intended($this->redirectTo);
    }

    return back()->withInput()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
}
   
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 

    return redirect('/');
}

    function attempts()
    {
        return 5; 
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
