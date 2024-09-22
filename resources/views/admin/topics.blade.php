@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Topics</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3"id="addTopicBtn">➕Add new Topic</a>
                </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">No. of views</th>
                            <th scope="col">Published</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Show Details</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($topics as $topic) 
                        <tr>
                            <th scope="row">{{$topic->created_at->format('d M Y')}}</th>
                            <td><a class="text-decoration-none text-dark" href="{{route('admin.topics.show',$topic->id)}}">{{$topic['topic_title']}}</a></td>
                            <td>{{ isset($topic->category) ? $topic->category->category_name : 'Uncategorized' }}</td>                            <td>{{Str::limit($topic['content'],7)}}</td>
                            <td>14</td>
                            <td>{{$topic['published'] ? 'Yes':'No'}}</td>
                            <td>{{$topic['trending'] ? 'Yes':'No'}}</td>
                            <td><a href="{{route('admin.topics.show',$topic->id)}}">show</a></td>

                            <td><a href="{{route('admin.topics.edit',$topic['id'])}}"><img src="{{asset('assests/images/edit-svgrepo-com.svg')}}">Edit</a></td>
                            <td> 
                            <a href="{{ route('admin.topics.destroy', $topic->id) }}" onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form-{{ $topic->id }}').submit(); }">Delete</a>
                            <form id="delete-form-{{ $topic->id }}" action="{{ route('admin.topics.destroy', $topic->id) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                            </form>
                             </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
  const addTopicBtn = document.querySelector('.btn-link'); // Select the button element
  const addTopicForm = document.getElementById('addTopicForm'); // Assuming your form has this ID

  addTopicBtn.addEventListener('click', function() {
    addTopicForm.style.display = (addTopicForm.style.display === 'none') ? 'block' : 'none';
  });
</script>
    @endsection