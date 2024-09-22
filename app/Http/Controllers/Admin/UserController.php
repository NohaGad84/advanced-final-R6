<?php

namespace App\Http\Controllers\Admin;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\Common;
use App\Models\Message;

class UserController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $messages = Message::select('id','message')->get();
        return view('admin.add_user',compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'Fullname' => 'required|string',
            'Lastname' => 'required|string',
            'Username' => 'required|string|unique:users,Username,' . $user->id, 
            'email' => 'required|string|email|unique:users,email,' . $user->id, 
            'phone' => 'nullable|string',
            'password' => 'nullable|string|confirmed', 
            'active' => 'nullable', 
        ]);
    
        $data['active'] = isset($request->active);

        User::create($data);

  return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
}
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $users = User::where('user_id', $user->id)->get();
        return view('admin.users', compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
{
  $user = User::findOrFail($user->id); 
  return view('admin.edit_user', compact('user'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $data = $request->validate([
        'Fullname' => 'required|string',
        'Lastname' => 'required|string',
        'Username' => 'required|string|unique:users,Username,' . $user->id, 
        'email' => 'required|string|email|unique:users,email,' . $user->id, 
        'phone' => 'nullable|string',
        'password' => 'nullable|string|confirmed',
        'active' => 'nullable', 
    ]);

    $data['active'] = isset($request->active); 

    if ($request->has('password')) { 
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
   
}
}
