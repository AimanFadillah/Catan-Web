<?php

namespace App\Http\Controllers;

use App\Models\CronJob;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CronJobResorce extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldData = CronJob::where('created_at', '<', Carbon::now()->subHour(1))->get();
        foreach ($oldData as $data) {
            $data->delete();
        }

        $countdowns = [];

        foreach ($oldData as $datum) {
            // Hitung selisih waktu antara tanggal dan waktu saat ini dengan tanggal dan waktu di mana data akan dihapus
            $diffInSeconds = Carbon::now()->diffInSeconds($datum->created_at->addHour(1));

            // Tambahkan hasil perhitungan waktu ke dalam array
            $countdowns[] = [
                'id' => $datum->id,
                'countdown' => $diffInSeconds
            ];
        }

        return view("test.cronjob",[
            "data" => CronJob::latest()->get(),
            "waktu" => $countdowns,
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
            "nama" => "required",
        ]);

        CronJob::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function show(CronJob $cronJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function edit(CronJob $cronJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CronJob $cronJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CronJob  $cronJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(CronJob $cronJob)
    {
        
    }
}
