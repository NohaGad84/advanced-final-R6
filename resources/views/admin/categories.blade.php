

@extends('admin.layouts.main')
@section('contentadmin')
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
                </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category) 

                        <tr>
                            <th scope="row">{{$category->created_at->format('d M Y')}}</th>
                            <td>{{$category['category_name']}}</td>
                            <td><a href="{{route('admin.categories.edit',$category['id'])}}"><img src="{{asset('assests/images/edit-svgrepo-com.svg')}}">Edit</a></td>
                            
                            <td> 
                            <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form-{{ $category->id }}').submit(); }">Delete</a>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                            </form>
                             </td>
                            </td> 
                         </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
  @endsection