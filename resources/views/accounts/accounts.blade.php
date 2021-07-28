@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-sm-12 mb-4">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" method="post" action="/accounts" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <input type="file" name="file">

              <button type="submit" class="btn btn-primary">Import</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
@endsection