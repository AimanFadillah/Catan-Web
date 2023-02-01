<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function store (Request $request) {

        $validatedData = $request->validate([
            "name" => "required",
            "email" => "required|email|",
            "password" => "required",
        ]);

        $validatedData["password"] = bcrypt( $validatedData["password"] );

        User::create($validatedData);

        $auth = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if(Auth::attempt($auth)){
            $request->session()->regenerate();
            return redirect()->intended("/test");
        }

        return back();
    }

    public function auth (Request $request) {

        $auth = $request->validate([
            "email" => "required|email|",
            "password" => "required",
        ]);

        if(Auth::attempt( $auth )){
            $request->session()->regenerate();
            return redirect()->intended("/test");
        }

        return back()->with("gagal","login mengalami kegagalan 😢");
    }

}
