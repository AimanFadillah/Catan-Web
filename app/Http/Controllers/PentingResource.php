<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penting;

class PentingResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("penting",[
            "Penting" => Penting::where("user_id",auth()->user()->id)->latest()->Cari(request("cari"))->paginate(20),
            "CariCatatan" => Penting::where("user_id",auth()->user()->id)->latest()->take(7)->get(),
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
            "judul" => "required",
            "body" => "required",
        ]);

        $validatedData["user_id"] = auth()->user()->id;

        Penting::create($validatedData);

        return redirect("/Penting")->with("berhasil","Catatan Berhasil Dimasukkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penting $Penting)
    {
        return view("showPenting",[
            "Penting" => $Penting,
        ]);
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
        
        $validatedData = $request->validate([
            "judul" => "required",
            "body" => "required",
        ]);

        Penting::where("id",$Penting->id)->update($validatedData);

        return back()->with("berhasil","Catatan berhasil diganti");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penting $Penting)
    {
        Penting::destroy($Penting->id);

        return redirect("/Penting")->with("berhasil","Catatan berhasil dihapus");
    }
}
