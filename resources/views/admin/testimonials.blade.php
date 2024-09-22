@extends('admin.layouts.main')

@section('contentadmin')
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Testimonials</h2>
                <a href="#" class="btn btn-link link-dark fw-semibold col-auto me-3">
                    ➕ Add new testimonial
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Published</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($testimonials as $testimonial)                                        <tr>
                <th scope="row">{{$testimonial->created_at->format('d M Y')}}</th>
                                        <td>{{ $testimonial->Name }}</td>
                            <td>{{ Str::limit($testimonial->content, 7) }}</td>
                            <td>{{ $testimonial->published ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
                                    <img src="{{ asset('assests/images/edit-svgrepo-com.svg') }}" alt="Edit"> Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                         </tbody>
                </table>
            </div>
        </div>
    </div>
   
@endsection