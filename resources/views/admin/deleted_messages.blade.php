@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Messages</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new message</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                        <th scope="col">Message</th>
                        <th scope="col">deleted At</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Permanent Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach ($messages as $message)
                    <tr>
                    <td>{{ $message->id }}</td>
                    <td>
  @if ($message->trashed())
    {{ $message->deleted_at->format('Y-m-d H:i:s') }}  <a href="{{ route('admin.messages.restore', $message->id) }}" class="btn btn-sm btn-success">Restore</a>
  @else
  <td>
    <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary">View</a>
    <form action="{{ route('admin.messages.delete-permanently', $message->id) }}" method="POST" style="display: inline-block">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger">Delete Permanently</button>
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