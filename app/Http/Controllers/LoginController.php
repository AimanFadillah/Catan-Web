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
            return redirect()->intended("/")->with("berhasil","Akun berhasil terdaftar 😋");
        }

        return back();
    }

    public function auth (Request $request) {

        $auth = $request->validate([
            "email" => "required|email|",
            "password" => "required",
        ]);

        $user = User::where("email",$auth["email"])->get();

        if(Auth::attempt( $auth )){
            $request->session()->regenerate();
            return redirect()->intended("/")->with("berhasil","Selamat Datang " . $user[0]["name"] );
        }

        return back()->with("gagal","login mengalami kegagalan 😢");
    }

    public function logout (Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

}
