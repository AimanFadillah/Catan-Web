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
    public function index()
    {
        return view("mingguan",[
            "senin" => Mingguan::where("user_id",auth()->user()->id)->where("hari","senin")->get(),
            "seninBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","senin")->count(),
            "seninCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","senin")->count(),

            "selasa" => Mingguan::where("user_id",auth()->user()->id)->where("hari","selasa")->get(),
            "selasaBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","selasa")->count(),
            "selasaCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","selasa")->count(),

            "rabu" => Mingguan::where("user_id",auth()->user()->id)->where("hari","rabu")->get(),
            "rabuBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","rabu")->count(),
            "rabuCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","rabu")->count(),
            
            "kamis" => Mingguan::where("user_id",auth()->user()->id)->where("hari","kamis")->get(),
            "kamisBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","kamis")->count(),
            "kamisCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","kamis")->count(),

            "jumat" => Mingguan::where("user_id",auth()->user()->id)->where("hari","jumat")->get(),
            "jumatBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","jumat")->count(),
            "jumatCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","jumat")->count(),

            "saptu" => Mingguan::where("user_id",auth()->user()->id)->where("hari","saptu")->get(),
            "saptuBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","saptu")->count(),
            "saptuCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","saptu")->count(),

            "minggu" => Mingguan::where("user_id",auth()->user()->id)->where("hari","minggu")->get(),
            "mingguBaris" => 5 - Mingguan::where("user_id",auth()->user()->id)->where("hari","minggu")->count(),
            "mingguCount" => Mingguan::where("user_id",auth()->user()->id)->where("hari","minggu")->count(),

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
            "judul" => "required",
            "body" => "required",
            "hari" => "required|max:10"
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["title"] = Str::limit( strip_tags( $request->judul ),15);

        Mingguan::create($validatedData);

        return back();
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
        $validatedData = $request->validate([
            "judul" => "required",
            "body" => "required",
        ]);

        $validatedData["title"] = Str::limit( strip_tags( $request->judul ),15);
        Mingguan::where("id",$Mingguan->id)->update($validatedData);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mingguan $Mingguan)
    {
        Mingguan::destroy($Mingguan->id);

        return back();
    }
}
