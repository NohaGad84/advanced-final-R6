@extends('admin.layouts.main')
@section('contentadmin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">{{ $topic->topic_title }}</h2>
                <a href="#" class="btn btn-link  link-dark fw-semibold col-auto me-3" id="addTopicBtn">➕Add new topic</a>
            </div>
            <div class="p-5">
                <div class="container-fluid g-0 pt-3 pb-5 px-lg-5 px-md-3 px-1">
                    <div
                      class="img-wrapper"
                    >
                      <img
                        src="{{asset('assests/images/topics'.$topic->image)}}"
                        class="rounded image-center border-5 rounded-4"
                        alt="DEI-header-img"
                      />
                    </div>
                    <!-- article -->
                    <div class="mx-auto pt-4" style="max-width: 1225px">
                      <article class="mx-md-4 ">
                        <h2 class="fs-1 py-4">{{ $topic->topic_title }}</h2>
                        <p>
              {{ $topic->content }}<br /><br />
            </p>

            <p>
              {{ $topic->content }}<br /><br />
            </p>

            <p>
              {{ $topic->content }}<br /><br />

            </p>
                        <div class="text-md-end">
                            <a class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5" href="{{ route('admin.topics.index') }}">
                              Back to All topics
                            </a>
                          </div>
                      </article>
                    </div>
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