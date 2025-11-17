<!-- resources/views/user/dashboard.blade.php -->

@extends('user.dashboard.layouts.app')

@section('content')

<section id="newSubmission" class="mb-5">
  <h3 class="text-info mb-3">New Submission</h3>
  <div class="card card-custom p-4 shadow">
    <!-- Form Start -->
    <form action="{{ route('user.submission') }}" method="POST" enctype="multipart/form-data">
      @csrf <!-- CSRF token -->

      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif

      <div class="mb-3">
        <label class="form-label text-light">Title</label>
        <input type="text" name="title" class="form-control bg-dark text-light border-0" placeholder="Enter title" required>
      </div>

      <div class="mb-3">
        <label class="form-label text-light">Description</label>
        <textarea name="description" class="form-control bg-dark text-light border-0" rows="3" placeholder="Enter details" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label text-light">Upload Document</label>
        <input type="file" name="document" class="form-control bg-dark text-light border-0" required>
      </div>

      <button type="submit" class="btn btn-cyan">Submit</button>
    </form>
    <!-- Form End -->
  </div>
</section>

@endsection
