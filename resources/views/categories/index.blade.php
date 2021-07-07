@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-sm-12 mb-4">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="/categories">
            @csrf
            <div class="col-3">
              <label for="">Category name</label>
              <input type="text" class="form-control" name="category_name"></input>
              <label for="">Category description</label>
              <input type="text" class="form-control" name="description"></input>
              <button class="btn btn-sm btn-success">Create category</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div data-masonry='{"percentPosition": true }' class="row">
      @foreach ($categories as $category)
        <div class="col-sm-3 gx-4 mb-4">
          <div class="card">
            <div class="card-body">
              <a href="/categories/{{ $category->id }}"><h5 class="card-title">{{ $category->category_name }}</h5></a>
              <p class="card-text">{{ $category->description }}</p>

              {{-- <div>
                <a href="/categories/{{ $post->category->id }}" class="badge badge-warning">{{ $post->category->category_name}}</a>
              </div> --}}

              {{-- <div class="d-flex justify-content-between">
                <a href="/posts/{{ $post->id }}" class="card-link">View post</a>

                @if (Auth::user() && Auth::user()->id == $post->user_id)
                <form method="POST" action="/posts/{{ $post->id }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>

                @endif
              </div> --}}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection