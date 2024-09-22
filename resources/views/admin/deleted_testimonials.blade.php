@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All testimonials</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new testimonial</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                        <th scope="col">deleted At</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Permanent Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach ($testimonials as $testimonial)
    <tr>
      <td>{{ $testimonial->name }}</td>
      <td>{{ Str::limit($testimonial->content, 7) }}</td>

      <td>
        @if ($testimonial->trashed())
          {{ $testimonial->deleted_at->format('Y-m-d H:i:s') }}
          <a href="{{ route('admin.testimonials.restore', $testimonial->id) }}" class="btn btn-sm btn-success">Restore</a>
        @endif
      </td>

      <td>
        @if (!$testimonial->trashed())
          <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn btn-sm btn-primary">View</a>
          <form action="{{ route('admin.testimonials.forceDelete', $testimonial->id) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>   

          </form>
        @endif
      </td>
    </tr>
  @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  @endsection