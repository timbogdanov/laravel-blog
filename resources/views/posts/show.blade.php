@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        {{ $post->title }}
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>{{ $post->body }}</p>
          <footer class="blockquote-footer">{{ $post->created_at }} by <cite title="Source Title">{{ $post->user->email }}</cite></footer>
        </blockquote>
      </div>
    </div>

    <hr>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Comments</h5>
        @if (Auth::user())
          <form action="/posts/{{ $post->id }}/comments" method="post">
            @csrf
            <div class="mb-3">
              <label for="comment" class="form-label">Leave comment</label>
              <input type="text" class="form-control" id="comment" name="body" aria-describedby="comment">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        @endif
        @foreach ($comments as $comment)
          <div class="col-sm-12">
            <a href="/profile/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
            <p>{{ $comment->body }}</p>

          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection