@extends('dashboard.layouts.main')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section py-5">
        <div class="container">
            <div class="row">
                @foreach ($allblogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-lg rounded-3 overflow-hidden">
                            <!-- Blog Image -->
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <a href="{{ route('editblog', $blog->id) }}">
                                <!-- Blog Title -->
                                <h5 class="card-title fw-bold">{{ $blog->title }}</h5>
                                <!-- Blog Content (Short Preview) -->
                                <p class="card-text text-muted">
                                    {{ Str::limit($blog->content, 100) }} <!-- Limits text to 100 characters -->
                                </p>
                                <p class="card-text text-muted">
                                    {{ $blog->created_at}}
                                </p>

                            </a>
                               <form action="{{ route('deleteblog',$blog->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blog->id }}">
                                <button type="submit" class="btn btn-danger btn-sm ml-6">
                                    Delete <i class="bi bi-trash"></i>
                                </button>

                               </form>

                               <a href="{{ route('editblog', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



        {{--
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Quill Editor Default</h5>

                <!-- Quill Editor Default -->
                <div id="quill-editor-default" class="quill-editor-default">
                    <p>Hello World!</p>
                    <p>This is Quill <strong>default</strong> editor</p>
                </div>
                <!-- End Quill Editor Default -->

                <button id="get-value-btn">Get Value</button>
                </div>
            </div> --}}

      {{-- <div class="card">
        <div class="card-body">
          <h5 class="card-title">Quill Editor Bubble</h5>

          <!-- Quill Editor Bubble -->
          <p>Select some text to display options in poppovers</p>
          <div class="quill-editor-bubble">
            <p>Hello World!</p>
            <p>This is Quill <strong>bubble</strong> editor</p>
          </div>
          <!-- End Quill Editor Bubble -->

        </div>
      </div> --}}

  </main><!-- End #main -->




@endsection
