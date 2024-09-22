@extends('admin.layouts.main')
@section('contentadmin')
  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
      <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="post" class="px-md-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
      <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Jhon Doe" class="form-control py-2" name="Name" value="{{old('Name',$testimonial->Name)}}"/>
            @error('Name')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="" rows="5" class="form-control">{{ old('content',$testimonial->content)}}</textarea>
          
            @error('content')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror</div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          
          <div class="col-md-10">
          <input type="checkbox" name="published" value="1" class="form-check-input" {{ old('published', $testimonial->published ?? false) ? 'checked' : '' }}>
         
            @error('published')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
        <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
        <div class="col-md-10">
            <input type="file" name="image" class="form-control"  value="{{ old('image',$testimonial->image) }}">
            
            @error('image')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Testimonial
          </button>
        </div>
      </form>
    </div>
  </div>
  </main>
 @endsection