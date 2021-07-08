@extends('layouts.app')

@section('content')
  <div class="container">
    <div data-masonry='{"percentPosition": true }' class="row">
      @foreach ($posts as $post)
        <div class="col-sm-4 gx-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <span>By: <a class="card-subtitle mb-2 text-muted" href="/profile/{{ $post->user->id }}"> {{ $post->user->name }}</a></span>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>

              <div>
                <a href="/categories/{{ $post->category->id }}" class="badge badge-warning">{{ $post->category->category_name}}</a>
              </div>

              <div class="d-flex justify-content-between">
                <a href="/posts/{{ $post->id }}" class="card-link">View post</a>
                
                <div class="d-flex">
                   @if (Auth::user())
                    <form method="POST" action="/profile/{{ Auth::user()->id }}/savedposts/{{ $post->id }}" >
                      @csrf
                      <button class="btn btn-sm btn-light">Save for later</button>
                    </form>
                  @endif

                  @if (Auth::user() && Auth::user()->id == $post->user_id)
                  <form method="POST" action="/posts/{{ $post->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection