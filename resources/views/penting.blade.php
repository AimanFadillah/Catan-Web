@extends('default.bosstrap')

@section('main')
    <div class="container">
      
      {{-- Peringatan --}}
      @if (session()->has("berhasil"))    
      <div class="row justify-content-center">
      <div class="col-md-10 alert alert-success alert-dismissible fade show" role="alert">
        {{ session("berhasil") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      </div>
      @endif

        {{-- modall --}}
        <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#FCE22A">
                  <h1 class="modal-title fs-5" id="modalCreate">Buat Catatan Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/Penting" method="post">
                    @csrf
                    <div class="modal-body">
                      {{-- judul --}}
                      <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul") }}">
                      
                      {{-- body --}}
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

          {{-- Modal Serching  --}}
          <div class="modal fade" id="modalSearching" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border:none" >
                <div class="modal-header" style="background-color: #645CBB" >
                  <div class="spinner-border  spinner-border-sm me-2" id="loading" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Cari Catatan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" >
                    <input type="search" id="mencari" class="form-control fw-bold mb-2" 
                    placeholder="Cari..." name="cari" autofocus autocomplete="off" value="{{ request("cari") }}">
                  </form>
                  @if($CariCatatan->count())
                  <div id="nyari" >
                    @foreach ($CariCatatan as $Carinya)
                      <a href="/Penting/{{ $Carinya->id }}" 
                        class="col-md-12 text-decoration-none text-dark pt-2 px-1 my-1 shadow d-flex justify-content-between align-items-center"
                        style="background-color: #BFACE2;border-radius:4px">
                        <h6 class="fw-bold" >{{ $Carinya->judul }}</h6>
                        <h6>{{ $Carinya->created_at->format("t-m-Y") }}</h6>
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

        <div class="row justify-content-center ">
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
            @if ($Penting->count())

            @foreach ($Penting as $Pentingnya)
                <a href="/Penting/{{ $Pentingnya->id }}" class="col-md-10 text-decoration-none text-dark py-2 shadow d-flex justify-content-between align-items-center" 
                style="{{ ($loop->iteration % 2) ?  "background-color: #F7F5EB" :  "background-color: #EAE0DA" }} ">
                  <h5 class="fw-bold" >{{ $Pentingnya->judul }}</h5>
                  <h6>{{ $Pentingnya->created_at->format("t-m-Y") }}</h6>
              </a>
              @endforeach
              
              @else
              
              <div class="col-md-10 py-4 shadow" style="background-color: #F7F5EB" >
                  <h3 class="text-center" >Tidak Ada Catatan </h3>
              </div>

            @endif
            <div class="col-md-10 shadow rounded-bottom py-1" style="background-color:#FCE22A" ></div>
            <div class="col-md-10 mt-3 ">
              {{ $Penting->links("Pagination.default") }}
            </div>
        </div>

       

    </div>

    <script>


        let container = document.getElementById("nyari");
        let cari = document.getElementById('mencari');
        let loading = document.getElementById('loading');

        loading.style.display = "none";

        cari.addEventListener("keyup",function () {
          
          let xhr = new XMLHttpRequest();
          loading.style.display = "block";

          xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200){
              container.innerHTML = xhr.responseText;
              loading.style.display = "none";
            }
          }

          xhr.open("GET","/ajax1238129312?cari=" + cari.value ,true);
          xhr.send();

        })


    </script>

@endsection