@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Users</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3"id="addUserBtn">➕Add new user</a>
            </div>
            <div class="table-responsive">
            <div id="addUserContent"></div>

                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Registration Date</th>
                            <th scope="col">FullName</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->created_at->format('d M Y')}}</th>
                            <td>{{$user['Fullname']}}</td>
                            <td>{{$user['Username']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['phone']}}</td>
                            <td>{{$user['active'] ? 'Yes':'No'}}</td>
                            <td><a href="{{route('admin.users.edit',$user['id'])}}"><img src="{{asset('assests/images/edit-svgrepo-com.svg')}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
const addUserBtn = document.querySelector('#addUserBtn');
const addUserContent = document.getElementById('addUserContent');

addUserBtn.addEventListener('click', function() {
  fetch("{{ route('admin.users.create')}}") // Replace with the correct route
    .then(response => response.text())
    .then(data => {
      addUserContent.innerHTML = data;
    })
    .catch(error => {
      console.error('Error fetching content:', error);
    });
});
</script>
   @endsection