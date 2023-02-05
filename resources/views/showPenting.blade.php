@extends('default.bosstrap')

@section('main')
    
    <div class="container mt-10">
        <div class="row justify-content-center ">
            <div class="col-md-10 rounded shadow " style="background-color: #FAF4B7">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>{{ $Penting->judul }}</h3>
                    <h6>{{ $Penting->created_at->format("t-m-Y") }}</h6>
                </div>
            </div> 
        </div>
    </div>

@endsection