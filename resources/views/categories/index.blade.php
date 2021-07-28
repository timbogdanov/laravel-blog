@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="/categories">
      @csrf
      <div class="col-3">
        <label for="">Category name</label>
        <input type="text" class="form-control" name="category_name"></input>
      </div>
      <div class="col-3">
        <label for="">Category description</label>
        <input type="text" class="form-control" name="description"></input>
      </div>
      <hr>
      <button class="btn btn-sm btn-success">Create category</button>
    </form>
  </div>
  </div>


  <div data-masonry='{"percentPosition": true }' >
    @foreach ($categories as $category)
      <div class="col-sm-3 gx-4 mb-4">
        <div class="card">
          <div class="card-body">
            <a href="/categories/{{ $category->id }}"><h5 class="card-title">{{ $category->category_name }}</h5></a>
            <p class="card-text">{{ $category->description }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection