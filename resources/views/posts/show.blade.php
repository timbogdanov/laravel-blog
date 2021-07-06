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
  </div>
@endsection