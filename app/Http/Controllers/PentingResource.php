<?php

namespace App\Http\Controllers;

use App\Models\Mingguan;
use Illuminate\Http\Request;
use App\Models\Penting;
use App\Models\Sekilas;
use illuminate\Support\Str;

class PentingResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query("d") === "penting"){
            $data = Penting::where("user_id",auth()->user()->id)->latest()->Cari(request("cari"))->paginate(30);

            foreach($data as $dt){
                $dt["tanggalFormat"] = $dt->created_at->format("d-m-Y");
            }

            return response()->json($data);
        }


        return view("penting",[
            "CariCatatan" => Penting::where("user_id",auth()->user()->id)->latest()->take(10)->get(),
            "PentingBaris" => 10 - Penting::where("user_id",auth()->user()->id)->count(),
            "barisPenting" => Penting::where("user_id",auth()->user()->id)->count(),
            "barisMingguan" => Mingguan::where("user_id",auth()->user()->id)->count(),
            "barisSekilas" => Sekilas::where("user_id",auth()->user()->id)->count(),
        ]);
    }

    public function ajax () {
        return view("ajax.ajaxPenting",[
            "CariCatatan" => Penting::where("user_id",auth()->user()->id)->latest()->Cari(request("cari"))->take(7)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            "judul" => "required|max:25",
            "body" => "required",
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["title"] = Str::limit( strip_tags( $request->judul ),15,"...");

        $catan = Penting::create($validatedData);

        $catan["tanggalFormat"] = $catan->created_at->format("t-m-Y");

        return response()->json($catan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penting $Penting)
    {
        if($Penting->user_id === auth()->user()->id){    
            return view("show",[
                "Penting" => $Penting,
                "barisPenting" => Penting::where("user_id",auth()->user()->id)->count(),
                "barisMingguan" => Mingguan::where("user_id",auth()->user()->id)->count(),
                "barisSekilas" => Sekilas::where("user_id",auth()->user()->id)->count(),
            ]);
        }

        abort(404); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

            return response()->json($data);
        }

        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penting $Penting)
    {
        if($Penting->user_id === auth()->user()->id){    
            Penting::destroy($Penting->id);
            return redirect("/Penting")->with("berhasilDelete","Catatan berhasil dihapus");
        }
        abort(404);
    }
}
