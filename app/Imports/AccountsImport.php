<?php

namespace App\Imports;

use App\Models\Account;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Auth;

class AccountsImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Account([
            'account_number' => $row['account_number'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'account' => $row['account'],
            'amount_owed' => $row['amount_owed'],
            'user_id' => Auth::user()->id
        ]);
    }
}
