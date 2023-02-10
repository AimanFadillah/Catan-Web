@extends('default.bosstrap')

@section('main')
    
    <div class="container mt-10">

         {{-- Modall Edit --}}
        <div class="modal fade"  id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#0F6292">
                  <h1 class="modal-title fs-5 text-light" id="modalEdit">Edit Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/Penting/{{ $Penting->id }}/" method="post">
                    @csrf
                    @method("put")
                    <div class="modal-body">
                      {{-- judul --}}
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror "
                    placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$Penting->judul) }}">
                      
                      {{-- body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body",$Penting->body) }}" >
                      <trix-editor input="body" required placeholder="Text @error("body")ini belum disi @enderror" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Perbarui</button>
                    </div>
                </form>
                
              </div>
            </div>
        </div>

        {{-- Modal Hapus --}}
        <div class="modal fade"  id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-body rounded-top">
                  <h1 class="modal-title fs-5" id="modalHapus">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Penting ini?</h1>
                </div>
                <form action="/Penting/{{ $Penting->id }}" method="post">
                    @csrf
                    @method("delete")
                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px" >
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success ms-1">Yakin</button>
                    </div>
                </form>
              </div>
            </div>
        </div>

        <div class="row justify-content-center "  >
            <div class="col-md-10 shadow text-light rounded-top shadow" style="background-color: #20262E">
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
            <div class="col-md-10 shadow py-3" id="konten" style="background-color: #F7F5EB;color:black;"  >
                <h1 class="text-center mt-2 mb-3" >{{ $Penting->judul }}</h1>
                <div style="word-wrap: break-word;" class="text-left" >{!! $Penting->body !!}</div>
                
                
            </div>
            <div class="col-md-10 rounded-bottom d-flex justify-content-between" style="background-color: #20262E" >
                <div class="d-flex align-items-center">
                    <button 
                    data-bs-toggle="modal" data-bs-target="#modalHapus"
                    style="border:none;background:none;" class="text-light"
                    ><i class="bi bi-trash"></i></button>
                    <button 
                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                    style="border:none;background:none;" class="text-light"
                    ><i class="bi bi-pencil-square"></i></button>
                </div>
                <a class="text-light text-decoration-none fs-3" href="/"><i class="bi bi-pen"></i>Ca<span style="color: #30E3DF" >tan</span></a>
                <div class="d-flex align-items-center pt-1">
                    <h6 class="text-light fw-bold d-flex">{{ $Penting->created_at->format("t-m-Y") }}</h6>
                </div>
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