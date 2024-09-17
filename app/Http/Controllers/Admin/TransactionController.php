<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __invoke() {
        $transactions = TransactionDetail::latest()->get();

        return view('admin.transactions.index', compact('transactions'));
    }
}
