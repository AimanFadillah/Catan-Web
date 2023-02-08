@extends('default.bosstrap')

@section('main')
    <div class="container">

         {{-- modall Searching --}}
         <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#379237">
                  <h1 class="modal-title fs-5 text-light" id="modalCreate">Buat Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/Mingguan" method="post">
                    @csrf
                    <div class="modal-body">
                      

                        <input type="hidden" name="hari" value="" >
                      {{-- Judul --}}
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul") }}">
                      
                        {{-- Hari --}}
                        <div class="my-3">
                            <span 
                            style="border:2px solid #0F6292;color:#0F6292;" class="fw-bold py-1 px-1 mb-1 rounded" >Senin</span>
                            <span 
                            style="border:2px solid #913175;color:#913175;" class="fw-bold py-1 px-1 mb-1 rounded" >Selasa</span>
                            <span 
                            style="border:2px solid #D61355;color:#D61355;" class="fw-bold py-1 px-1 mb-1 rounded" >Rabu</span>
                            <span 
                            style="border:2px solid #F99417;color:#F99417;" class="fw-bold py-1 px-1 mb-1 rounded" >Kamis</span>
                            <span 
                            style="border:2px solid #FF78F0;color:#FF78F0;" class="fw-bold py-1 px-1 mb-1 rounded" >Jumat</span>
                            <span 
                            style="border:2px solid #FF7B54;color:#FF7B54;" class="fw-bold py-1 px-1 mb-1 rounded m" >Saptu</span>
                            <span 
                            style="border:2px solid #10A19D;color:#10A19D;" class="fw-bold py-1 px-1 mb-1 rounded" >Minggu</span>
                        </div>

                      {{-- Body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body") }}" >
                      <trix-editor input="body" required placeholder="Text @error("body")ini belum disi @enderror" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
                
              </div>
            </div>
          </div>

        <div class="row justify-content-center">
            <div class="col-md-11 d-flex rounded justify-content-between">
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

        <div class="row justify-content-evenly">
            {{-- Senin --}}
            <div class="col-md-3 mt-3 rounded ">
                <div class="shadow rounded">
                <p class="text-center text-light fs-3 rounded-top" style="background-color:#0F6292;margin-bottom:-16px">Senin<p>
                <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                <div style="background-color:#0F6292" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Selasa --}}
            <div class="col-md-4 mt-3 rounded  ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#913175;margin-bottom:-16px">Selasa<p>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <div style="background-color:#913175" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Rabu --}}
            <div class="col-md-3 mt-3  rounded  ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#D61355;margin-bottom:-16px">Rabu<p>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <div style="background-color:#D61355" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Kamis --}}
            <div class="col-md-3 mt-3  rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#F99417;margin-bottom:-16px">Kamis<p>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <div style="background-color:#F99417" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Jumat --}}
            <div class="col-md-4 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#FF78F0;margin-bottom:-16px">Jumat<p>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <div style="background-color:#FF78F0" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            <div class="col-md-3 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#FF7B54;margin-bottom:-16px">Sabtu<p>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <div style="background-color:#FF7B54" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            <div class="col-md-4 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#10A19D;margin-bottom:-16px">Minggu<p>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0" >kosong</h6>
                    <div style="background-color:#10A19D" class="rounded-bottom py-1" ></div>
                </div>
            </div>
        </div>

    </div>
@endsection