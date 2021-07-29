@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-sm-12 mb-4">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" method="post" action="/accounts" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
              <input type="file" name="file" id="file-input-1">
              <label for="file-input-1">Choose a file</label>
            </div>

            <button type="submit" class="btn btn-primary">Import</button>
          </form>
        </div>
      </div>
    </div>

    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Account number</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Account</th>
            <th scope="col">Amount Owned</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($accounts as $account)
            <tr>
              <td><a href="/account/{{ $account->account_number }}">{{ $account->account_number }}</a></td>
              <td>{{ $account->first_name }}</td>
              <td>{{ $account->last_name }}</td>
              <td>{{ $account->account }}</td>
              <td>${{ number_format($account->amount_owed, 2, '.', ',')  }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection