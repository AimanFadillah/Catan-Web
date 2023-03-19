@extends('default.bosstrap')

@section('main')

    {{-- Notif --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast align-items-center bg-primary text-light" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Catatan Berhasil DiUpdate 🥳
            </div>
            <button type="button" class="btn-close text-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        </div>
    </div>
    
    <div class="container mt-10">

         {{-- Modall Edit --}}
        <form action="/catan/{{ $Penting->id }}/update/" method="post">
        <div class="modal fade"  id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#0F6292">
                  <h1 class="modal-title fs-5 text-light" id="modalEdit">Edit Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                
                    @csrf
                    <div class="modal-body">
                      {{-- judul --}}
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror "
                    placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$Penting->judul) }}">
                      {{-- body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body",$Penting->body) }}" >
                      <trix-editor id="bodyInputUpdate" input="body" placeholder="Text Body" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="batalUpdateButton" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" data-catan="{{ $Penting->id }}" id="updateButton" class="btn btn-success">Perbarui</button>
                    </div>
                
                
              </div>
            </div>
        </div>
        </form>

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
                        <button type="button"   class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" data class="btn btn-success ms-1">Yakin</button>
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
                <h1 id="showJudulPenting" class="text-center mt-2 mb-3" style="word-wrap: break-word" >{{ $Penting->judul }}</h1>
                <div id="showBodyPenting" style="word-wrap: break-word;" class="text-left" >{!! $Penting->body !!}</div>
                
                
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
                    <h6 class="text-light fw-bold d-flex">{{ $Penting->created_at->format("d-m-Y") }}</h6>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="/js/show.js"></script> --}}

@endsection