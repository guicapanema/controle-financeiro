<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $accounts = Account::withSum('transactions', 'amount')->get();
        $categories = Category::withSum('transactions', 'amount')->get();

        return view('dashboard', compact('accounts', 'categories'));
    }
}
