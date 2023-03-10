<?php

namespace App\Http\Controllers;

use App\Models\Mingguan;
use App\Models\Penting;
use App\Models\Sekilas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatanController extends Controller
{
    public function index () {
        if(Auth::check()){
        return view("home",[
            "barisPenting" => Penting::where("user_id",auth()->user()->id)->count(),
            "barisMingguan" => Mingguan::where("user_id",auth()->user()->id)->count(),
            "barisSekilas" => Sekilas::where("user_id",auth()->user()->id)->count(),
        ]);
        }else{
            return view("home");
        }
        
    }

}
