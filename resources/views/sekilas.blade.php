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
                  <div class="text-decoration-none col-md-3 m-1 mb-5 rounded shadow p-0 " style="background-color: #F7F5EB;">
                  <div class="text-center px-2 rounded-top text-light fw-bold pt-1 d-flex justify-content-between align-items-center" 
                      style="background-color: #F94A29;word-wrap: break-word;">
                      <h6 class=" fs-3">{{ $Sekilasnya->judul }}</h6>
                      <div class="d-flex align-items-center">
                        <form action="/Penting" method="POST" class="d-inline" >
                            @csrf
                            <input type="hidden" name="judul" value="{{ $Sekilasnya->judul }}" >
                            <input type="hidden" name="body" value="{{ $Sekilasnya->body }}" >
                            <button  style="background: none;border:none;padding:0" class="text-light" type="submit"
                            ><i class="bi bi-exclamation-triangle fs-5 me-3"></i></button>
                        </form>
                        <button style="background: none;border:none;padding:0" data-bs-toggle="modal" data-bs-target="#Full{{ $loop->iteration }}" >
                          <i class="bi bi-fullscreen text-light fs-6 me-3"></i>
                        </button>
                        <form action="/Sekilas/{{ $Sekilasnya->id }}" method="post" class="d-inline">
                          @csrf
                          @method("delete")
                          <button style="background: none;border:none;padding:0" class="text-light" ><i class="bi bi-trash fs-5"></i></button>
                        </form>
                      </div>
                  </div>
                  <p class="mx-2 mt-2 text-dark " style="word-wrap: break-word;" >{{ $Sekilasnya->head }}</p>
                </div>
            @endforeach
            
        </div>

        {{-- Modal Full --}}
        @foreach ($Sekilas as $catatannya)
        <div class="modal fade"  id="Full{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content" style="border: none">
              <div class="modal-head" style="background-color: #F94A29;">
                <div class="d-flex justify-content-between align-items-center px-2 text-light fw-bold" style="margin-bottom:-15px" >
                  <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="word-wrap: break-word;" >{{ $catatannya->judul }}</div>
                  <button class="btn-close " style="margin-top: -15px" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="modal-body">
                  
                  
                  <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
              </div>
             </div>
          </div>
      </div>
      @endforeach

    </div>
@endsection