@extends('layouts.app')

@section('content')
<div class="container">
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
              <tr>
                <td>{{ $account->account_number }}</td>
                <td>{{ $account->first_name }}</td>
                <td>{{ $account->last_name }}</td>
                <td>{{ $account->account }}</td>
                <td>${{ number_format($account->amount_owed, 2, '.', ',')  }}</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection