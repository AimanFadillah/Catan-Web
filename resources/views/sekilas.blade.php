@extends('default.bosstrap')

@section('main')
    <div class="container">

        {{-- Model buat --}}
        <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header text-light"  style="background-color:#F94A29">
                  <h1 class="modal-title fs-5" id="modalCreate">Buat Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/Sekilas" method="post">
                    @csrf
                    <div class="modal-body">
                      {{-- judul --}}
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul") }}">
                      
                      {{-- body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body") }}" >
                      <trix-editor input="body" required placeholder="Text Body @error("body")ini Belum diisi @enderror" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Buat</button>
                    </div>
                </form>
                
              </div>
            </div>
          </div>

        {{-- Button --}}
        <div class="row justify-content-center ">
            <div class="col-md-11 d-flex  rounded justify-content-between">
                <div class="">
                    <a href="/Sekilas" ><img src="/img/iconSekilasKecil.png" alt="Sekilas"></a>
                    <a href="/Penting" ><img src="/img/iconPentingKecil.png" alt="Penting"></a>
                    <a href="/Mingguan" ><img src="/img/iconKalenderKecil.png" alt="Mingguan"></a>
                </div>
                <div class="">
                    <button data-bs-toggle="modal" data-bs-target="#modalCreate" style="border: none;background:none;padding:0;" >
                        <img src="/img/iconTambah.png" alt="TambahCatatan" >
                    </button>
                </div>
            </div>
        </div>
            
        {{-- konten --}}
        <div class="row justify-content-around" style="justify-content: " >
            {{-- Peringatan --}}
            <p class="text-center mb-3 mt-3" >Catatan Sekilas Hanya Bertahan <span class="text-danger fw-bold" >1 jam</span></p>

            @foreach ($Sekilas as $Sekilasnya)
                <a href="/Sekilas/{{ $Sekilasnya->id }}" class="text-decoration-none col-md-3 m-1 mb-5 rounded shadow p-0 " style="background-color: #F7F5EB;">
                    <p class="text-center fs-3 rounded-top text-light fw-bold" style="background-color: #F94A29;word-wrap: break-word;" >{{ $Sekilasnya->judul }}</p>
                    <p class="mx-2 text-dark " style="height:180px;word-wrap: break-word;" >{{ $Sekilasnya->head }}</p>
                    <div class="py-2 rounded-bottom" style="background-color: #F94A29" ></div>
                </a>
            @endforeach
            
        </div>

    </div>
@endsection