<?php

namespace App\Http\Controllers;

use App\Models\Sekilas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SekilasResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldData = Sekilas::where('created_at', '<', Carbon::now()->subHour(1))->get();
        foreach ($oldData as $data) {
            $data->delete();
        }

        return view("sekilas",[
            "Sekilas" => Sekilas::where("user_id",auth()->user()->id)->latest()->get(),
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
        ]);
        
        $validatedData["head"] = Str::limit( strip_tags( $request->body),230,"....");
        $validatedData["user_id"] = auth()->user()->id;

        Sekilas::create($validatedData);
    
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
        return view("showsekilas",[
            "Sekilas" => Sekilas::where("user_id",auth()->user()->id)->where("id",$id)->get(),
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
