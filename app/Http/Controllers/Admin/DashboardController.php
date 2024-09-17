<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{

    public function __invoke()
    {
        $productCount = Product::count();
        $transcationCount = Transaction::count();
        return view('admin.dashboard', compact('productCount', 'transcationCount'));
    }
}
