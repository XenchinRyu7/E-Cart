<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;


class AuthController extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $admin = Admin::whereEmail($request->email)->wherePassword($request->password)->first();

        if ($admin) {
            return redirect()->route('/admin/dashboard');
        } else {
            return redirect()->back();
        }
    }
}
