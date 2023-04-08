<?php

namespace App\Http\Controllers;

use App\Models\Mingguan;
use App\Models\Penting;
use App\Models\Sekilas;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class MingguanResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query("find")){
            $data =  Mingguan::find($request->query("find"));
            return response()->json($data);
        }

        $hari = ["senin","selasa","rabu","kamis","jumat","saptu","minggu"];

        return view("mingguan",[
            "dataMingguan" => Mingguan::where("user_id",auth()->user()->id)->get(),
            "harinya" => $hari,


            "barisPenting" => Penting::where("user_id",auth()->user()->id)->count(),
            "barisMingguan" => Mingguan::where("user_id",auth()->user()->id)->count(),
            "barisSekilas" => Sekilas::where("user_id",auth()->user()->id)->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "hari" => "required|max:10"
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["title"] = Str::limit( strip_tags( $request->judul ),15);

        $data = Mingguan::create($validatedData);

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request,Mingguan $Mingguan)
    {
        if(auth()->user()->id === $Mingguan->user_id){
   
            $validatedData = $request->validate([
                "judul" => "required|max:25",
                "body" => "required",
            ]);
            
            $validatedData["title"] = Str::limit( strip_tags( $request->judul ),15);
            Mingguan::where("id",$Mingguan->id)->update($validatedData);
            
            $data = Mingguan::find($Mingguan->id);

            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mingguan $Mingguan)
    {
        if(auth()->user()->id === $Mingguan->user_id){
            Mingguan::destroy($Mingguan->id);
            $Mingguan["count"] = Mingguan::where("user_id",auth()->user()->id)->where("hari",$Mingguan->hari)->count();
            return response()->json($Mingguan);
        }
    }
}
