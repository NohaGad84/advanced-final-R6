<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\User;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unreadMessages = Message::where('is_read', 0)->get();
        $readMessages = Message::where('is_read', 1)->get();

        return view('admin.messages', compact('unreadMessages', 'readMessages'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

     public function show(Request $request, string $id)
     {
         $unreadMessages = $request->input('unreadMessages');
         $readMessages = $request->input('readMessages');
     
         $message = Message::with('user')->findOrFail($id);
         $user = $message->user; 
         $message->update(['is_read' => 1]);
     
         return view('admin.message_details', compact('message', 'unreadMessages', 'readMessages', 'user'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $message = Message::findOrFail($id);
    $message->delete();

    return redirect()->route('admin.messages')->with('success', 'Message deleted successfully!');
}
public function restore(string $id)
{
    $message = Message::withTrashed()->findOrFail($id);
    $message->restore();

    return redirect()->route('admin.messages')->with('success', 'Message restored successfully!');
}
public function showDeleted()
   {
       $deletedmessages = Message::onlyTrashed()->get(); // 

       return view('admin.messages.deleted', compact('deletedmessages'));
   }

public function deletePermanently(string $id)
{
    $message = Message::withTrashed()->findOrFail($id);
    $message->forceDelete();

    return redirect()->route('admin.messages')->with('success', 'Message deleted permanently!');
}
}