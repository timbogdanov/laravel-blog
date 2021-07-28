@extends('layouts.app')

@section('content')
  <div class="card">
    <form method="POST" action="/posts" >
      @csrf
      <div class="col-12">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title">
      </div>
      <div class="col-12">
        <label for="">Body</label>
        <textarea type="text" class="form-control" name="body"></textarea>
      </div>
      <div class="col-12">
        <select class="form-control" name="category" aria-label="Default select example">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
        </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>
@endsection