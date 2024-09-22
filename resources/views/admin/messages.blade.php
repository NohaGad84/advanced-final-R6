@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    @if ($unreadMessages)
                    @foreach ($unreadMessages as $message)

                        <tr>
                        <th scope="row">{{ $message->created_at }}</th>
                        <td><a href="{{ route('admin.messages.show', ['id' => $message->id, 'unreadMessages' => $unreadMessages, 'readMessages' => $readMessages]) }}">{{ $message->message }}</a></td>
                        <td>{{ $message->user->name }}</td>
                        <td> 
                        <a href="{{ route('admin.messages.destroy', ['id' => $message->id, 'unreadMessages' => $unreadMessages, 'readMessages' => $readMessages]) }}" onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form-{{ $message->id }}').submit(); }">Delete</a>
<form id="delete-form-{{ $message->id }}" action="{{ route('admin.messages.destroy', ['id' => $message->id, 'unreadMessages' => $unreadMessages, 'readMessages' => $readMessages]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                             </td>
                           </tr>
                        @endforeach
                        @endif

                        
                        
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table2">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    @if ($readMessages)
                    @foreach ($readMessages as $message)

                        <tr>
                        <th scope="row">{{ $message->created_at }}</th>
                        <td><a href="{{ route('admin.messages.show', ['id' => $message->id, 'unreadMessages' => $unreadMessages, 'readMessages' => $readMessages]) }}">{{ $message->message }}</td>
                        <td>{{ $message->user->name }}</td>
                        <td> 
                        <a href="{{ route('admin.messages.destroy', ['id' => $message->id, 'unreadMessages' => $unreadMessages, 'readMessages' => $readMessages]) }}" onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form-{{ $message->id }}').submit(); }">Delete</a>
<form id="delete-form-{{ $message->id }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                             </td>
                                </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
   @endsection