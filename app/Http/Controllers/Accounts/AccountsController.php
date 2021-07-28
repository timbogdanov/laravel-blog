<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Imports\AccountsImport;
use Illuminate\Http\Request;
use App\Models\Account;
use Excel;

use Auth;

class AccountsController extends Controller
{
    public function accounts(Request $request) {
        $accounts = Account::where('user_id', Auth::user()->id)->get();
        $search = $request->input('search_account');

        if ($search) {
            $accounts = $accounts->where('account_number', $search);
        }

        return view('accounts.accounts')->with(['accounts' => $accounts]);
    }

    public function show_account(Request $request) {
        $account = Account::where('account_number', $request->account)->first();

        return view('accounts.show_account')->with(['account' => $account]);
    }

    public function import_accounts(Request $request) {
        $file = $request->file('file');

        Excel::import(new AccountsImport, $file);

        return back()->withStatus('File imported successfully');
    }

}
