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

    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered">
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
    </div>
  </div>
@endsection