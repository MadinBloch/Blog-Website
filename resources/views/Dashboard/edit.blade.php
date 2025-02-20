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
      <div class="container">
        <h2>Edit Blog</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row g-3" action="{{ route('updateblog', $blog->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="blogTitle" class="form-label">Blog Title</label>
                <input type="text" class="form-control @error('blogTitle') is-invalid @enderror"
                       id="blogTitle" name="blogTitle" value="{{ old('blogTitle', $blog->title) }}">
                @error('blogTitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="blogCategory" class="form-label">Category</label>
                <select id="blogCategory" class="form-select @error('blogCategory') is-invalid @enderror" name="blogCategory">
                    <option selected disabled>Choose a category...</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('blogCategory', $blog->category_id) == $categorie->id ? 'selected' : '' }}>
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
                @if ($blog->image)
                    <p class="mt-2"><img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" width="150"></p>
                @endif
                @error('blogImage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="blogContent" class="form-label">Blog Content</label>
                <textarea class="form-control @error('blogContent') is-invalid @enderror" name="blogContent" id="blogContent" rows="6">{{ old('blogContent', $blog->content) }}</textarea>
                @error('blogContent')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="blogStatus" class="form-label">Blog Status</label>
                <select id="blogStatus" class="form-select @error('blogStatus') is-invalid @enderror" name="blogStatus">
                    <option value="draft" {{ old('blogStatus', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('blogStatus', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('blogStatus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Blog</button>
                <a href="#" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>


  </main>


@endsection
