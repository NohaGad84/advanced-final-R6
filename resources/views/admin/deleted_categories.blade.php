@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All categories</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Restore</th>
                            <th scope="col">Permanent Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach ($categories as $category)
      <tr>
        <td><a class="text-decoration-none text-dark" href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></td>
        <td>
          @if ($category->trashed())
            <form action="{{ route('admin.categories.restore', $category->id) }}" method="post">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-link m-0 p-0">Restore</button>
            </form>
          @endif
        </td>
        <td>
          @if (!$category->trashed())
            <form action="{{ route('admin.categories.forceDelete', $category->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link m-0 p-0 text-danger">Permanently Delete</button>
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