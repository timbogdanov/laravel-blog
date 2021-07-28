@extends('layouts.app')

@section('content')

  <div class="content">
    <h1 class="content-title">Posts</h1>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cupiditate incidunt consequatur.
  </div>

  <div data-masonry='{"percentPosition": true}'>
  @forelse ($posts as $post)
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-title">{{ $post->title }}</h5>
          <span>By: <a class="card-subtitle mb-2 text-muted" href="/profile/{{ $post->user->id }}"> {{ $post->user->name }}</a></span>
          <div class="card-body">
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
      @empty
      <div class="col-sm-4 mb-4">
        <p class="badge badge-danger">No posts to show</p>
      </div> 
      @endforelse
    </div>
@endsection