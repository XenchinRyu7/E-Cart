<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect()->route("welcome");
        }
    

        return view('/customer/auth');
    }

    public function register() {
        return view('/customer/register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                "email" => "required",
                "password" => "required"
            ]
        );


        if(Auth::attempt($credentials)) {
            return redirect()->route("welcome");
        }

        return response()->json([
            "message" => "Invalid credentials"
        ]);
    }

    public function registration(Request $request) {

        $newUser = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route("userLogin");
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("userLogin");
    }
}
