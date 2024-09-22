@extends('layouts.app')

@section('content')
    <h1>Message Details</h1>

    <p><strong>Name:</strong> {{ $message->Name }}</p>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Subject:</strong> {{ $message->subject }}</p>
    <p><strong>Message:</strong> {{ $message->message }}</p>
@endsection