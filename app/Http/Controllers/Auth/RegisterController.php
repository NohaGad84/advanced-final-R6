<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showRegistrationForm()
{
    return view('auth.register');
}
public function register(Request $request)
{
    $request->validate([
        'Fullname' => 'required|string|max:255',
        'Lastname' => 'required|string|max:255',
        'Username' => 'required|string|max:255',

        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = User::create([
        'Fullname' => 'required|string|max:255',
        'Lastname' => 'required|string|max:255',
        'Username' => 'required|string|max:255',
         'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Optionally, log the user in automatically after registration
    Auth::login($user);

    return redirect()->route('login')->with('success', 'Registration successful!');
}


    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // RegisterController.php

protected function validator(array $data)
{
  return Validator::make($data, [
    'Fullname' => ['required', 'string', 'max:255'],
    'Lastname' => ['required', 'string', 'max:255'],
    'Username' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
  ]);
}
 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
protected function create(array $data)
{
  return User::create([
    'Fullname' => $data['Fullname'] . ' ' . $data['Lastname'], // Combine Fullname and Lastname
    'Username'=>$data['Usename'] ,
    'email' => $data['email'],
    'email_verified_at' => null,

    'password' => Hash::make($data['password']),

  ]);
}

   
}

