@extends('admin.layouts.main')
@section('contentadmin')

<div class="container my-5">
  <div class="mx-2">
    <h2 class="fw-bold fs-2 mb-5 pb-2">Add USER</h2>
    <form action="{{route('admin.users.store')}}" method="post" class="px-md-5">
      @csrf

      <div class="form-group mb-3 row">
        <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
        <div class="col-md-5">
          <input type="text" placeholder="First Name" name="Fullname" class="form-control py-2" value="{{ old('Fullname') }}" />
          @error('Fullname')
          <div class="col-md-12">
            <div class="alert alert-warning">{{ $message }}</div>
          </div>
        @enderror
        </div>
        <div class="col-md-5">
          <input type="text" placeholder="Last Name" name="Lastname" class="form-control py-2" value="{{ old('Lastname') }}" />
        </div>
        @error('Lastname')
          <div class="col-md-12">
            <div class="alert alert-warning">{{ $message }}</div>
          </div>
        @enderror
      </div>

      <div class="form-group mb-3 row">
        <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
        <div class="col-md-10">
          <input type="text" placeholder="e.g. Jhon33" name="Username" class="form-control py-2" value="{{ old('Username') }}" />
        </div>
        @error('Username')
          <div class="col-md-12">
            <div class="alert alert-warning">{{ $message }}</div>
          </div>
        @enderror
      </div>

      <div class="form-group mb-3 row">
        <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
        <div class="col-md-10">
          <input type="email" placeholder="e.g. Jhon@example.com" name="email" class="form-control py-2" value="{{ old('email') }}" />
        </div>
        @error('email')
          <div class="col-md-12">
            <div class="alert alert-warning">{{ $message }}</div>
          </div>
        @enderror
      </div>

      <div class="form-group mb-3 row">
        <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
        <div class="col-md-10">
          <input type="password" placeholder="Password" name="password" class="form-control py-2" />
          @error('password')
            <div class="col-md-12">
              <div class="alert alert-warning">{{ $message }}</div>
            </div>
          @enderror
        </div>
      </div>

      <div class="form-group mb-3 row">
        <label for="" class="form-label col-md-2 fw-bold text-md-end">Confirm Password:</label>
        <div class="col-md-10">
          <input type="password" placeholder="Confirm Password" name="confirmpassword" class="form-control py-2" />
          @error('confirmpassword')
            <div class="col-md-12">
              <div class="alert alert-warning">{{ $message }}</div>
            </div>
          @enderror
        </div>
      </div>

      <div class="text-md-end">
        <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
          Add User
        </button>
      </div>
    </form>
  </div>
</div>
</main>
@endsection