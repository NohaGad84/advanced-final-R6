@extends('public.layouts.main')

@section('content')
<form action="{{ route('contact-us') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" class="form-control" id="subject" name="subject" required>
    </div>
    <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        <h2>Contact Form Submission</h2>
        <p>Hi {{ $data['Name'] }},</p>
        <p>Thank you for contacting us! We received your message with the following details:</p>
        <ul>
            <li>Email: {{ $data['email'] }}</li>
            <li>Subject: {{ $data['subject'] }}</li>
            <li>Message: {{ $data['message'] }}</li>
        </ul>
        <p>We will get back to you as soon as possible.</p>
        <p>Sincerely,</p>
        <p>The Company Team</p>
    </div>
@endif
@endsection