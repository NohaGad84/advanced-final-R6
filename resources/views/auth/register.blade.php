@extends('admin.layouts.register')
@section('contentadmin')


    <div class="container my-5 bg-white rounded-3">
        <div class="row">
            <div class="col-md-5 d-none d-md-block img-wrapper">
                <img src="{{ asset('assests/images/rear-view-young-college-student.jpg') }}" alt="">
            </div>
            <div class="col-md-7">
                <<form action="{{ route('register') }}" method="post"
				class="text-center h-100 px-3 d-flex flex-column justify-content-center">
                    @csrf
                    <h3 class="fw-semibold mb-5">REGISTRATION FORM</h3>
                    <div class="input-group mb-3">
  <input type="text" name="Fullname" placeholder="First Name" class="form-control me-2">
  <input type="text" name="Lastname" placeholder="Last Name" class="form-control">
</div>
                    <div class="input-group mb-3">
                        <input type="text" name="Username" placeholder="Username" class="form-control">
                        <img src="{{ asset('assests/images/user-svgrepo-com.svg') }}" alt="" class="input-group-text">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" placeholder="Email Address" class="form-control">
                        <img src="{{ asset('assests/images/email-svgrepo-com.svg') }}" alt="" class="input-group-text">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <img src="{{ asset('assests/images/password-svgrepo-com.svg') }}" alt="" class="input-group-text">
                    </div>
                    <div class="input-group mb-5">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                        <img src="{{ asset('assests/images/password-svgrepo-com.svg') }}" alt="" class="input-group-text">
                    </div>
                    <button class="btn btn-dark px-5 mb-2">
                        REGISTER
                        <img src="{{ asset('assests/images/arrow-sm-right-svgrepo-com.svg') }}" alt="">
                    </button>
                    <a href="{{ route('login') }}" class="fw-semibold fs-6 text-decoration-none text-dark">Already have account?</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
@endsection