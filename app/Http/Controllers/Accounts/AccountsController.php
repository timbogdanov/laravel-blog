<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Imports\AccountsImport;
use Illuminate\Http\Request;
use Excel;

class AccountsController extends Controller
{
    public function accounts() {
        return view('accounts.accounts');
    }

    public function show_account() {
        return view('accounts.show_accounts');
    }

    public function import_accounts(Request $request) {
        $file = $request->file('file');

        Excel::import(new AccountsImport, $file);

        return back()->withStatus('File imported successfully');

    }

}
