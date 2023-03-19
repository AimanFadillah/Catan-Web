<?php

namespace App\Http\Controllers;

use App\Models\Mingguan;
use App\Models\Penting;
use App\Models\Sekilas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function update(Request $request,Penting $Penting)
    {
        if($Penting->user_id === auth()->user()->id){    
            $validatedData = $request->validate([
                "judul" => "required|max:25",
                "body" => "required",
            ]);

            $validatedData["title"] = Str::limit( strip_tags( $request->judul ),15,"...");
            Penting::where("id",$Penting->id)->update($validatedData);

            $data = Penting::find($Penting->id);

            return back();
        }

        abort(404);
    }

}
