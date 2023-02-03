@extends('default.bosstrap')

@section('main')
    <div class="container">

        {{-- modall --}}
        <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#FCE22A">
                  <h1 class="modal-title fs-5" id="modalCreate">Create Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/penting/catatan" method="get">
                    @csrf
                    <div class="modal-body">
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required>
                      
                      <input id="body" type="hidden" name="body">
                      <trix-editor input="body" required placeholder="Text @error("body") Teks ini belum disi @enderror" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
                
              </div>
            </div>
          </div>

        <div class="row justify-content-center ">
            <div class="col-md-10 d-flex rounded-top shadow justify-content-between py-1 align-items-center" style="background-color:#FCE22A">
                <div>
                    <a href="/Sekilas" ><img src="/img/iconSekilasKecil.png" alt="iconSekilas"></a>
                    <a href="/Penting"><img src="/img/iconPentingKecil.png" alt="iconPenting"></a>
                    <a href="/Mingguan"><img src="/img//iconKalenderKecil.png" alt="iconKalender"></a>
                </div>
                <div class="">
                    <img src="/img/iconCari.png" alt="">
                    <button style="border: none;background:none;padding:0;" 
                            data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <img src="/img/iconTambah.png" alt="TambahCatatan"></button>
                </div>
            </div>
            <a href="/" class="col-md-10 text-decoration-none text-dark py-2 shadow d-flex justify-content-between align-items-center" style="background-color: #EAE0DA">
                <h5 class="fw-bold" >Catatan</h5>
                <h6>20-1-2023</h6>
            </a>
            <a href="/" class="col-md-10 text-decoration-none text-dark py-2 shadow d-flex justify-content-between align-items-center" style="background-color: #F7F5EB">
                <h5 class="fw-bold" >Catatan</h5>
                <h6>20-1-2023</h6>
            </a>
        </div>


    </div>
@endsection