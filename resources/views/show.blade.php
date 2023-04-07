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
        <div class="modal fade"  id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#0F6292">
                  <h1 class="modal-title fs-5 text-light" id="modalEdit">Edit Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formShow"  method="post">
                    @csrf
                    <div class="modal-body">
                      {{-- judul --}}
                      <input type="judul" maxlength="25" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror "
                    placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$Penting->judul) }}">
                        @error("judul")
                        <h6 class="mx-0 ms-2 text-danger" style="font-size: 13px" >{{ $message }}</h6>
                        @enderror
                      {{-- body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body",$Penting->body) }}" >
                      <trix-editor  id="bodyInputUpdate" input="body" required placeholder="Text @error("body")ini belum disi @enderror" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="batalUpdateButton" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" data-catan="{{ $Penting->id }}" id="updateButton" class="btn btn-success">Perbarui</button>
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
                <form action="/Penting/{{ $Penting->id }}" id="formDelete" method="post">
                    @csrf
                    @method("delete")
                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px" >
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="submitDelete" class="btn btn-success ms-1">Yakin</button>
                    </div>
                </form>
              </div>
            </div>
        </div>

        <div class="row justify-content-center "  >
            <div class="col-md-10 shadow text-light rounded-top shadow" style="background-color: #20262E">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div class="">
                        <span class="px-3 rounded bg-primary me-2 pilihColor" id="primary"></span>
                        <span class="px-3 rounded bg-success me-2 pilihColor" id="success"></span>
                        <span class="px-3 rounded bg-danger me-2 pilihColor" id="danger" ></span>
                    </div>
                    <div class="">
                        <span class="px-3 rounded bg-warning me-2 pilihColor" id="warning" ></span>
                        <span class="px-3 rounded bg-info me-2 pilihColor" id="info" ></span>
                        <span class="px-3 rounded pilihColor" id="normal" style="background-color: #F7F5EB"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-10 shadow py-3" id="konten" style="background-color: #F7F5EB;"  >
                <h1 class="text-center mt-2 mb-3"  id="showJudulPenting" style="word-wrap: break-word" >{{ $Penting->judul }}</h1>
                <div style="word-wrap: break-word;font-size:20px;" id="showBodyPenting" class="text-left" >{!! $Penting->body !!}</div>
            </div>
            <div class="col-md-10 rounded-bottom d-flex justify-content-between" style="background-color: #20262E" >
                <div class="d-flex align-items-center">
                    <button 
                    data-bs-toggle="modal" data-bs-target="#modalHapus"
                    style="border:none;background:none;" class="text-light"
                    ><i class="bi bi-trash" style="fon" ></i></button>
                    <button 
                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                    style="border:none;background:none;" class="text-light"
                    ><i class="bi bi-pencil-square"></i></button>
                    <button 
                    id="salinButton"
                    style="border:none;background:none;" class="text-light"
                    ><i class="bi bi-fullscreen"></i></button>
                    <button 
                    id="pdfButton"
                    style="border:none;background:none;" class="text-light"
                    ><i class="bi bi-filetype-pdf"></i></button>
                </div>
                <a class="text-light text-decoration-none fs-3" href="/Penting"></a>
                <div class="d-flex align-items-center">
                    <div class="dropdown mx-1">
                        <a class="bg-dark text-light text-decoration-none" data-bs-toggle="dropdown">
                            <i class="bi bi-fonts fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" style="width: 10%" >
                            <li><a class="dropdown-item fontStyle" data-style="">Default</a></li>
                          <li><a class="dropdown-item fontStyle" data-style="Serif" >Serif</a></li>
                          <li><a class="dropdown-item fontStyle" data-style="Sans-serif">Sans-serif</a></li>
                          <li><a class="dropdown-item fontStyle" data-style="Monospace">Monospace</a></li>
                          <li><a class="dropdown-item fontStyle" data-style="Cursive">Cursive</a></li>
                          <li><a class="dropdown-item fontStyle" data-style="Fantasy">Fantasy</a></li>
                        </ul>
                    </div>
                    <div class="dropdown mx-1 mb-1">
                        <a class="bg-dark text-light text-decoration-none" data-bs-toggle="dropdown">
                            <i class="bi bi-type fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" style="width: 10%" >
                          <li><a class="dropdown-item fontSize" data-size="10px" >1x</a></li>
                          <li><a class="dropdown-item fontSize" data-size="20px">2x</a></li>
                          <li><a class="dropdown-item fontSize" data-size="30px">3x</a></li>
                          <li><a class="dropdown-item fontSize" data-size="40px">4x</a></li>
                          <li><a class="dropdown-item fontSize" data-size="50px">5x</a></li>
                          <li><a class="dropdown-item fontSize" data-size="60px">6x</a></li>
                        </ul>
                    </div>
                    <label 
                    for="textColorButton"
                    style="border:none;background:none;" class="text-light mx-2"
                    ><i class="bi bi-palette fs-6"></i><input type="color" id="textColorButton" style="position:absolute;z-index:-1" ></label>
                    <label 
                    for="colorButton"
                    style="border:none;background:none;" class="text-light mx-2"
                    ><i class="bi bi-paint-bucket fs-5"></i><input type="color" id="colorButton" style="position:absolute;z-index:-1;width:1%"></label>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script> --}}
    <script src="/js/show.js"></script>


@endsection