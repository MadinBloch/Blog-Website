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

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>

      @endif
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Write a New Blog</h5>

                <!-- Blog Form -->
                <form class="row g-3" action="{{ route('creteblog') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="blogTitle" class="form-label">Blog Title</label>
                        <input type="text" class="form-control @error('blogTitle') is-invalid @enderror"
                               id="blogTitle" name="blogTitle" placeholder="Enter blog title" value="{{ old('blogTitle') }}">
                        @error('blogTitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="blogCategory" class="form-label">Category</label>
                        <select id="blogCategory" class="form-select @error('blogCategory') is-invalid @enderror" name="blogCategory">
                            <option selected disabled>Choose a category...</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('blogCategory') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('blogCategory')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="blogImage" class="form-label">Upload Thumbnail</label>
                        <input type="file" class="form-control @error('blogImage') is-invalid @enderror" id="blogImage" name="blogImage">
                        @error('blogImage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="blogContent" class="form-label">Blog Content</label>
                        <textarea class="form-control @error('blogContent') is-invalid @enderror" name="blogContent" id="blogContent" rows="6" placeholder="Write your blog here...">{{ old('blogContent') }}</textarea>
                        @error('blogContent')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="blogStatus" class="form-label">Blog Status</label>
                        <select id="blogStatus" class="form-select @error('blogStatus') is-invalid @enderror" name="blogStatus">
                            <option value="draft" {{ old('blogStatus') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('blogStatus') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('blogStatus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit Blog</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- End Blog Form -->

            </div>
          </div>

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
<!-- Include Quill JS and CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    // Initialize Quill editor
    var quill = new Quill('#quill-editor-default', {
      theme: 'snow'
    });

    // Button click event to get the value
    document.getElementById('get-value-btn').addEventListener('click', function() {
      // Get the HTML content
      var htmlContent = quill.root.innerHTML;
      console.log('HTML Content:', htmlContent);

      // Get the text content
      var textContent = quill.getText();
      console.log('Text Content:', textContent);

      // Get the Delta content (rich text format)
      var deltaContent = quill.getContents();
      console.log('Delta Content:', deltaContent);
    });
  </script>

@endsection
