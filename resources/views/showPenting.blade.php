@extends('default.bosstrap')

@section('main')
    
    <div class="container mt-10">
        <div class="row justify-content-center "  >
            <div class="col-md-10 shadow text-light rounded-top " style="background-color: #20262E">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div class="">
                        <span class="px-3 rounded bg-primary me-2" id="primary"></span>
                        <span class="px-3 rounded bg-success me-2" id="success"></span>
                        <span class="px-3 rounded bg-danger me-2" id="danger" ></span>
                    </div>
                    <div class="">
                        <span class="px-3 rounded bg-warning me-2" id="warning" ></span>
                        <span class="px-3 rounded bg-info me-2" id="info" ></span>
                        <span class="px-3 rounded " id="normal" style="background-color: #F7F5EB"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-10 rounded-bottom shadow" id="konten" style="background-color: #F7F5EB;color:black;" >
                <h1 class="text-center mt-2 mb-3" >{{ $Penting->judul }}</h1>
                {!! $Penting->body !!}
            </div>
        </div>
    </div>

    
    <script>

        let primary = document.querySelector("#primary");
        let info = document.querySelector("#info");
        let success = document.querySelector("#success");
        let danger = document.querySelector("#danger");
        let warning = document.querySelector("#warning");
        let normal = document.querySelector("#normal");

        let konten = document.querySelector("#konten");

    
    
        primary.addEventListener("click",function () {
            konten.style.backgroundColor = "none";
            konten.style.color = "white";
            konten.classList.add("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        });

        info.addEventListener("click",function () {
            konten.style.backgroundColor = "none";
            konten.style.color = "black";
            konten.classList.remove("bg-primary");
            konten.classList.add("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        });

        success.addEventListener("click",function () {
            konten.style.backgroundColor = "none";
            konten.style.color = "white";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.add("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        });

        danger.addEventListener("click",function () {
            konten.style.backgroundColor = "none";
            konten.style.color = "white";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.add("bg-danger");
            konten.classList.remove("bg-warning");
        });

        warning.addEventListener("click",function () {
            konten.style.backgroundColor = "none";
            konten.style.color = "black";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.add("bg-warning");
        });

        normal.addEventListener("click",function () {
            konten.style.backgroundColor = "#F7F5EB";
            konten.style.color = "black";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        });


    </script>

@endsection