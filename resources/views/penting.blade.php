@extends('default.bosstrap')

@section('main')

{{-- Notif --}}
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="liveToast" class="toast align-items-center bg-success text-light" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Catatan Penting Berhasil Dibuat 😍
      </div>
      <button type="button" class="btn-close text-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>




    <div class="container">

      {{-- Peringatan --}}
      @if (session()->has("berhasilDelete"))    
      <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="ToastDelete" class="toast align-items-center bg-danger text-light" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              Catatan Berhasil DiHapus 😳
            </div>
            <button type="button" class="btn-close text-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>
      @endif
      

        {{-- modal Penting --}}
        <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#FCE22A">
                  <h1 class="modal-title fs-5" id="modalCreate">Buat Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formPenting">
                    @csrf
                    <div class="modal-body">
                      {{-- judul --}}
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul") }}">
                      @error("judul")
                      <h6 class="mx-0 ms-2 text-danger" style="font-size: 13px" >{{ $message }}</h6>
                      @enderror
                      {{-- body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body") }}" >
                      <trix-editor input="body" id="textareaTrix" placeholder="Text Body @error("body")ini Belum diisi @enderror" ></trix-editor>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="batalCreate" class="btn btn-danger" data-bs-dismiss="modal" >Batal</button>
                      <button type="submit" class="btn btn-success" id="buatCreatePenting" type="button" >
                        Buat
                      </button>
                    </div>
                </form>
                
              </div>
            </div>
          </div>

          {{-- Modal Serching  --}}
          <div class="modal fade" id="modalSearching" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
              <div class="modal-content" style="border:none" >
                <div class="modal-header text-light" style="background-color: #645CBB" >
                  <div class="spinner-border  spinner-border-sm me-2" id="loading" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <h1 class="modal-title fs-5 " id="exampleModalLabel">Cari Catatan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="mencari" class="form-control fw-bold mb-2" 
                    placeholder="Cari..." name="cari" autofocus autocomplete="off" value="{{ request("cari") }}">
                  @if($CariCatatan->count())
                  <div id="nyari" >
                    @foreach ($CariCatatan as $Carinya)
                      <a href="/Penting/{{ $Carinya->id }}" 
                        class="col-md-12 text-decoration-none text-dark pt-2 px-1 my-1 shadow d-flex justify-content-between align-items-center"
                        style="background-color: #BFACE2;border-radius:4px">
                        <h6 class="fw-bold" >{{ $Carinya->judul }}</h6>
                        <h6>{{ $Carinya->created_at->format("d-m-Y") }}</h6>
                      </a>
                    @endforeach
                  </div>
                  @else

                      <div class="col-md-12 py-2 my-1 text-center shadow rounded" style="background-color: #BFACE2">
                        <h5>Tidak Ada Catatan😢</h5>
                      </div>

                  @endif
                </div>
              </div>
            </div>
          </div>

        <div class="row justify-content-center " id="kontenPenting" >
            <div class="col-md-10 d-flex rounded-top shadow justify-content-between py-1 align-items-center" style="background-color:#FCE22A">
                <div>
                    <a href="/Sekilas" ><img src="/img/iconSekilasKecil.png" alt="iconSekilas"></a>
                    <a href="/Penting"><img src="/img/iconPentingKecil.png" alt="iconPenting"></a>
                    <a href="/Mingguan"><img src="/img//iconKalenderKecil.png" alt="iconKalender"></a>
                </div>
                <div class="">
                    <button style="border: none;background:none;padding:0;"
                            data-bs-toggle="modal" data-bs-target="#modalSearching">
                      <img src="/img/iconCari.png" alt="Cari" ></button>
                    <button style="border: none;background:none;padding:0;" 
                            data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <img src="/img/iconTambah.png" alt="TambahCatatan"></button>
                </div>
            </div>
           
              <div class="col-md-10 shadow rounded-bottom py-1" id="penutupCatanPenting" style="background-color:#FCE22A" ></div>
        </div>

       

    </div>

    <script src="js/penting.js"></script>

@endsection