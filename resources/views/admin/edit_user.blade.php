@extends('admin.layouts.main')
@section('contentadmin')

<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit User</h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
  @csrf
  @method('PUT')

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-5">
        <input type="text" placeholder="First Name" name="Fullname" class="form-control py-2" value="{{ old('Fullname', $user->Fullname) }}" />
        @error('Fullname')
            <div class="alert alert-warning">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-5">
        <input type="text" placeholder="LastName" name="Lastname" class="form-control py-2" value="{{ old('Lastname', $user->Lastname) }}" />
        @error('Lastname')
            <div class="alert alert-warning">{{ $message }}</div>
        @enderror
    </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
          <div class="col-md-10">
            <input type="text" name="Username" placeholder="e.g. Jhon33" class="form-control py-2" value="{{ old('Username', $user->Username) }}"/>
            @error('Username')
              <div class="alert alert-warning">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
          <div class="col-md-10">
            <input type="email" name="email" placeholder="e.g. Jhon@example.com" class="form-control py-2" value="{{ old('email', $user->email) }}"/>
            @error('email')
              <div class="alert alert-warning">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
          <div class="col-md-10">
            <input type="password" name="password" placeholder="Password" class="form-control py-2" value="" />
            @error('password')
              <div class="alert alert-warning">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Active:</label>
          @error('active')
            <div class="alert alert-warning">{{ $message }}</div>
          @enderror
          <div class="col-md-10">
            <input type="checkbox" name="active" class="form-check-input" style="padding: 0.7rem;" @checked(old('active', $user->active)) value="1" />
          </div>
        </div>

        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit User
          </button>
        </div>
  </div>
  </main>
  @endsection