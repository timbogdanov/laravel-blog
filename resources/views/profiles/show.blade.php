@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col-sm-6">
        <h5>{{ $profile->user->name }}</h5>
        <p class="text-muted">{{ $profile->user->email }}</p>
      </div>
      
      @if (Auth::user()->id != $profile->user->id)
        <div class="col-sm-6 text-right">
          <form action="" method="post">
            @csrf
            <button class="btn btn-primary btn-sm" type="submit">Follow</button>
          </form>
        </div>
      @endif
    </div>

    <div data-masonry='{"percentPosition": true }' class="row">
      @foreach ($posts as $post)
        <div class="col-sm-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <span>By: <a class="card-subtitle mb-2 text-muted" href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></span>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>

              <div>
                <a href="/categories/{{ $post->category->id }}" class="badge badge-warning">{{ $post->category->category_name}}</a>
              </div>

              <div class="d-flex justify-content-between">
                <a href="/posts/{{ $post->id }}" class="card-link">View post</a>

                @if (Auth::user() && Auth::user()->id == $post->user_id)
                <form method="post" action="/posts/{{ $post->id }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>

                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection