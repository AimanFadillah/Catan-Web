@extends('default.bosstrap')

@section('main')
    
    <div class="container mt-10">
        <div class="row justify-content-center ">
            <div class="col-md-10 shadow text-light" style="background-color: #20262E">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div class="">
                        <i class="bi bi-fullscreen fs-4 ms-2"></i>
                        <i class="bi bi-filetype-pdf ms-2 fs-4"></i>
                    </div>
                    <div class="">
                        <span class="py-1 px-3 rounded bg-primary me-2"></span>
                        <span class="py-1 px-3 rounded bg-info me-2"></span>
                        <span class="py-1 px-3 rounded bg-success me-2"></span>
                        <span class="py-1 px-3 rounded bg-danger me-2"></span>
                        <span class="py-1 px-3 rounded bg-warning "></span>
                    </div>
                </div>
            </div>
            <div class="col-md-10 rounded-bottom shadow" style="background-color: #F7F5EB" >
                <h1 class="text-center mt-2" >{{ $Penting->judul }}</h1>
                {!! $Penting->body !!}
            </div>
        </div>
    </div>

@endsection