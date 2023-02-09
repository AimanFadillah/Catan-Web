@extends('default.bosstrap')

@section('main')
    <div class="container">
        {{-- hidden --}}
        <input type="hidden" id="seninCount" value="{{ $seninCount }}" >
        <input type="hidden" id="selasaCount" value="{{ $selasaCount }}" >
        <input type="hidden" id="rabuCount" value="{{ $rabuCount }}" >
        <input type="hidden" id="kamisCount" value="{{ $kamisCount }}" >
        <input type="hidden" id="jumatCount" value="{{ $jumatCount }}" >
        <input type="hidden" id="saptuCount" value="{{ $saptuCount }}" >
        <input type="hidden" id="mingguCount" value="{{ $mingguCount }}" >

        {{-- Peringatan --}}
        @if (session()->has("berhasil"))    
        <div class="row justify-content-center">
        <div class="col-md-11 alert alert-success alert-dismissible fade show" role="alert">
            {{ session("berhasil") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
        @endif

         {{-- modall Create --}}
         <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#379237">
                  <h1 class="modal-title fs-5 text-light" id="modalCreate">Buat Catatan Penting</h1>
                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/Mingguan" method="post">
                    @csrf
                    <div class="modal-body">
                      
                        <input type="hidden" name="hari" id="hari" value="" >
                         {{-- Judul --}}
                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul") }}">
                      
                        {{-- Hari --}}
                        <div class="d-flex mb-1" style="flex-wrap: wrap" >
                            <div 
                            style="border:2px solid #0F6292;color:#0F6292;cursor:pointer" id="senin" class="fw-bold py-1 px-1 ms-0 m-1 rounded" >Senin</div>
                            <div 
                            style="border:2px solid #913175;color:#913175;cursor:pointer" id="selasa" class="fw-bold py-1 px-1 ms-0 m-1 rounded" >Selasa</div>
                            <div 
                            style="border:2px solid #D61355;color:#D61355;cursor:pointer" id="rabu" class="fw-bold py-1 px-1 ms-0 m-1 rounded" >Rabu</div>
                            <div 
                            style="border:2px solid #F99417;color:#F99417;cursor:pointer" id="kamis" class="fw-bold py-1 px-1 ms-0 m-1 rounded" >Kamis</div>
                            <div 
                            style="border:2px solid #FF78F0;color:#FF78F0;cursor:pointer" id="jumat" class="fw-bold py-1 px-1 ms-0 m-1 rounded" >Jumat</div>
                            <div 
                            style="border:2px solid #FF7B54;color:#FF7B54;cursor:pointer" id="saptu" class="fw-bold py-1 px-1 ms-0 m-1 rounded " >Saptu</div>
                            <div 
                            style="border:2px solid #10A19D;color:#10A19D;cursor:pointer" id="minggu" class="fw-bold py-1 px-1 ms-0 m-1 rounded" >Minggu</div>
                            <div 
                            class="pt-2 px-1 ms-0 m-1 rounded" id="pesan" >Pilih Hari yang anda inginkan</div>
                        </div>

                      {{-- Body --}}
                      <input id="body" type="hidden" name="body" value="{{ old("body") }}" >
                      <trix-editor input="body" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
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
                    <button id="repair" style="border: none;background:none;padding:0;" >
                        <img src="/img/iconRepairKecil.png" alt="RepairCatatan" >
                    </button>
                    <button id="user" style="border: none;background:none;padding:0;display:none" >
                        <img src="/img/iconUserKecil.png" id="imgRepair" alt="RepairCatatan" >
                    </button>
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

                    @foreach($senin as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Senin{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Senin{{ $loop->iteration }}" id="SeninShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="SeninEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display:inline" >
                                    @method("delete")
                                    @csrf
                                    <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    style="submit"
                                    id="SeninDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach

                    @if($seninBaris > 0)
                        @for($a = 0;$a < $seninBaris;$a++)
                        <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                        @endfor
                    @endif
                <div style="background-color:#0F6292" class="rounded-bottom py-1" ></div>   
                </div>
            </div>
            {{-- Selasa --}}
            <div class="col-md-4 mt-3 rounded  ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#913175;margin-bottom:-16px">Selasa<p>
                        @foreach($selasa as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Selasa{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0">{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Selasa{{ $loop->iteration }}" id="SelasaShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="SelasaEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display: inline" >
                                    @method("delete")
                                    @csrf
                                    <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="SelasaDeleteCatan{{ $loop->iteration }}"
                                    type="submit">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach
                        @if($selasaBaris > 0)
                            @for($a = 0;$a < $selasaBaris;$a++)
                            <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                            @endfor
                        @endif
                    <div style="background-color:#913175" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Rabu --}}
            <div class="col-md-3 mt-3  rounded  ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#D61355;margin-bottom:-16px">Rabu<p>
                        @foreach($rabu as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Rabu{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0">{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Rabu{{ $loop->iteration }}" id="RabuShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="RabuEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display: inline" >
                                    @method("delete")
                                    @csrf
                                    <button
                                    type="submit"
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="RabuDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach
                        @if($rabuBaris > 0)
                            @for($a = 0;$a < $rabuBaris;$a++)
                            <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                            @endfor
                        @endif
                    <div style="background-color:#D61355" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Kamis --}}
            <div class="col-md-3 mt-3  rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#F99417;margin-bottom:-16px">Kamis<p>
                        @foreach($kamis as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Kamis{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0">{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Kamis{{ $loop->iteration }}" id="KamisShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="KamisEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display: inline" >
                                    @csrf
                                    @method("delete")
                                    <button
                                    type="submit"
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="KamisDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach
                        @if($kamisBaris > 0)
                            @for($a = 0;$a < $kamisBaris;$a++)
                            <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                            @endfor
                        @endif
                    <div style="background-color:#F99417" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            {{-- Jumat --}}
            <div class="col-md-4 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#FF78F0;margin-bottom:-16px">Jumat<p>
                        @foreach($jumat as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Jumat{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0">{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Jumat{{ $loop->iteration }}" id="JumatShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="JumatEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display: inline" >
                                    @csrf
                                    @method("delete")
                                    <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="JumatDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach
                        @if($jumatBaris > 0)
                            @for($a = 0;$a < $jumatBaris;$a++)
                            <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                            @endfor
                        @endif
                    <div style="background-color:#FF78F0" class="rounded-bottom py-1" ></div>
                </div>
            </div>

            {{-- Saptu --}}
            <div class="col-md-3 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#FF7B54;margin-bottom:-16px">Sabtu<p>
                        @foreach($saptu as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Saptu{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0">{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Saptu{{ $loop->iteration }}" id="SaptuShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="SaptuEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display: inline" >
                                    @csrf
                                    @method("delete")
                                    <button
                                    type="submit"
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="SaptuDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach
                        @if($saptuBaris > 0)
                            @for($a = 0;$a < $saptuBaris;$a++)
                            <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                            @endfor
                        @endif
                    <div style="background-color:#FF7B54" class="rounded-bottom py-1" ></div>
                </div>
            </div>
            <div class="col-md-4 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#10A19D;margin-bottom:-16px">Minggu<p>
                        @foreach($minggu as $catatannya)
                        {{-- modal --}}
                        <div class="modal fade"  id="Minggu{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="text-center fs-3 mb-4 fw-bold pt-0">{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word;" class="text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-between align-items-center border-bottom " style="background-color: #F7F5EB">
                            <h6 class="fs-6 px-1 py-2 mb-0" >{{ $catatannya->judul }}</h6>
                            <div>
                                {{-- Show --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                data-bs-toggle="modal" data-bs-target="#Minggu{{ $loop->iteration }}" id="MingguShowCatan{{ $loop->iteration }}">
                                <i class="bi bi-eye"></i></button>
                                {{-- Edit --}}
                                <button
                                class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}" id="MingguEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post" style="display: inline" >
                                    @csrf
                                    @method("delete")
                                    <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="MingguDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>


                    @endforeach
                        @if($mingguBaris > 0)
                            @for($a = 0;$a < $mingguBaris;$a++)
                            <h6 style="background-color: #F7F5EB" class="fs-6 px-1 py-2 mb-0 border-bottom" >-</h6>
                            @endfor
                        @endif
                    <div style="background-color:#10A19D" class="rounded-bottom py-1" ></div>
                </div>
            </div>
        </div>

    </div>

    <script>
        let senin = document.querySelector("#senin");
        let selasa = document.querySelector("#selasa");
        let rabu = document.querySelector("#rabu");
        let kamis = document.querySelector("#kamis");
        let jumat = document.querySelector("#jumat");
        let saptu = document.querySelector("#saptu");
        let minggu = document.querySelector("#minggu");

        let pesan = document.querySelector("#pesan");
        let hari = document.querySelector("#hari");

        senin.addEventListener("click",function () {
            senin.style.backgroundColor = "#0F6292";
            senin.style.color = "white";
            selasa.style.backgroundColor = "white";
            selasa.style.color = "#913175";
            rabu.style.backgroundColor = "white";
            rabu.style.color = "#D61355";
            kamis.style.backgroundColor = "white";
            kamis.style.color = "#F99417";
            jumat.style.backgroundColor = "white";
            jumat.style.color = "#FF78F0";
            saptu.style.backgroundColor = "white";
            saptu.style.color = "#FF7B54";
            minggu.style.backgroundColor = "white";
            minggu.style.color = "#10A19D";
            hari.value = "senin";
            pesan.style.display = "none";
        });

        selasa.addEventListener("click",function () {
            selasa.style.backgroundColor = "#913175";
            selasa.style.color = "white";
            senin.style.backgroundColor = "white";
            senin.style.color = "#0F6292";
            rabu.style.backgroundColor = "white";
            rabu.style.color = "#D61355";
            kamis.style.backgroundColor = "white";
            kamis.style.color = "#F99417";
            jumat.style.backgroundColor = "white";
            jumat.style.color = "#FF78F0";
            saptu.style.backgroundColor = "white";
            saptu.style.color = "#FF7B54";
            minggu.style.backgroundColor = "white";
            minggu.style.color = "#10A19D";
            hari.value = "selasa";
            pesan.style.display = "none";
        });

        rabu.addEventListener("click",function () {
            rabu.style.backgroundColor = "#D61355";
            rabu.style.color = "white";
            senin.style.backgroundColor = "white";
            senin.style.color = "#0F6292";
            selasa.style.backgroundColor = "white";
            selasa.style.color = "#913175";
            kamis.style.backgroundColor = "white";
            kamis.style.color = "#F99417";
            jumat.style.backgroundColor = "white";
            jumat.style.color = "#FF78F0";
            saptu.style.backgroundColor = "white";
            saptu.style.color = "#FF7B54";
            minggu.style.backgroundColor = "white";
            minggu.style.color = "#10A19D";
            hari.value = "rabu";
            pesan.style.display = "none";
        });

        kamis.addEventListener("click",function () {
            kamis.style.backgroundColor = "#F99417";
            kamis.style.color = "white";
            senin.style.backgroundColor = "white";
            senin.style.color = "#0F6292";
            selasa.style.backgroundColor = "white";
            selasa.style.color = "#913175";
            rabu.style.backgroundColor = "white";
            rabu.style.color = "#D61355";
            jumat.style.backgroundColor = "white";
            jumat.style.color = "#FF78F0";
            saptu.style.backgroundColor = "white";
            saptu.style.color = "#FF7B54";
            minggu.style.backgroundColor = "white";
            minggu.style.color = "#10A19D";
            hari.value = "kamis";
            pesan.style.display = "none";
        });

        jumat.addEventListener("click",function () {
            jumat.style.backgroundColor = "#FF78F0";
            jumat.style.color = "white";
            senin.style.backgroundColor = "white";
            senin.style.color = "#0F6292";
            selasa.style.backgroundColor = "white";
            selasa.style.color = "#913175";
            rabu.style.backgroundColor = "white";
            rabu.style.color = "#D61355";
            kamis.style.backgroundColor = "white";
            kamis.style.color = "#F99417";
            saptu.style.backgroundColor = "white";
            saptu.style.color = "#FF7B54";
            minggu.style.backgroundColor = "white";
            minggu.style.color = "#10A19D";
            hari.value = "jumat";
            pesan.style.display = "none";
        });

        saptu.addEventListener("click",function () {
            saptu.style.backgroundColor = "#FF7B54";
            saptu.style.color = "white";
            senin.style.backgroundColor = "white";
            senin.style.color = "#0F6292";
            selasa.style.backgroundColor = "white";
            selasa.style.color = "#913175";
            rabu.style.backgroundColor = "white";
            rabu.style.color = "#D61355";
            kamis.style.backgroundColor = "white";
            kamis.style.color = "#F99417";
            jumat.style.backgroundColor = "white";
            jumat.style.color = "#FF78F0";
            minggu.style.backgroundColor = "white";
            minggu.style.color = "#10A19D";
            hari.value = "saptu";
            pesan.style.display = "none";
        });

        minggu.addEventListener("click",function () {
            minggu.style.backgroundColor = "#10A19D";
            minggu.style.color = "white";
            senin.style.backgroundColor = "white";
            senin.style.color = "#0F6292";
            selasa.style.backgroundColor = "white";
            selasa.style.color = "#913175";
            rabu.style.backgroundColor = "white";
            rabu.style.color = "#D61355";
            kamis.style.backgroundColor = "white";
            kamis.style.color = "#F99417";
            jumat.style.backgroundColor = "white";
            jumat.style.color = "#FF78F0";
            saptu.style.backgroundColor = "white";
            saptu.style.color = "#FF7B54";
            hari.value = "minggu";
            pesan.style.display = "none";
        });
    
        // Mode Admin

        let repair = document.querySelector("#repair");
        let user = document.querySelector("#user");
        let seninBaris = document.querySelector("#seninCount").value;
        let selasaCount = document.querySelector("#selasaCount").value;
        let rabuCount = document.querySelector("#rabuCount").value;
        let kamisCount = document.querySelector("#kamisCount").value;
        let jumatCount = document.querySelector("#jumatCount").value;
        let saptuCount = document.querySelector("#saptuCount").value;
        let mingguCount = document.querySelector("#mingguCount").value;
       

        repair.addEventListener("click",function () {
            repair.style.display = "none";
            user.style.display = "inline";
            // Senin 
            for(let w = 1;w <= seninBaris;w++){
                window["SeninDeleteCatan" + w] = document.querySelector("#SeninDeleteCatan" + w);
                window["SeninDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= seninBaris;w++){
                window["SeninEditCatan" + w] = document.querySelector("#SeninEditCatan" + w);
                window["SeninEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= seninBaris;w++){
                window["SeninShowCatan" + w] = document.querySelector("#SeninShowCatan" + w);
                window["SeninShowCatan" + w].style.display = "none";
            };

            // Selasa
            for(let w = 1;w <= selasaCount;w++){
                window["SelasaDeleteCatan" + w] = document.querySelector("#SelasaDeleteCatan" + w);
                window["SelasaDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= selasaCount;w++){
                window["SelasaEditCatan" + w] = document.querySelector("#SelasaEditCatan" + w);
                window["SelasaEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= selasaCount;w++){
                window["SelasaShowCatan" + w] = document.querySelector("#SelasaShowCatan" + w);
                window["SelasaShowCatan" + w].style.display = "none";
            };

            // Rabu
            for(let w = 1;w <= rabuCount;w++){
                window["RabuDeleteCatan" + w] = document.querySelector("#RabuDeleteCatan" + w);
                window["RabuDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= rabuCount;w++){
                window["RabuEditCatan" + w] = document.querySelector("#RabuEditCatan" + w);
                window["RabuEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= rabuCount;w++){
                window["RabuShowCatan" + w] = document.querySelector("#RabuShowCatan" + w);
                window["RabuShowCatan" + w].style.display = "none";
            };

            // kamis
            for(let w = 1;w <= kamisCount;w++){
                window["KamisDeleteCatan" + w] = document.querySelector("#KamisDeleteCatan" + w);
                window["KamisDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= kamisCount;w++){
                window["KamisEditCatan" + w] = document.querySelector("#KamisEditCatan" + w);
                window["KamisEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= kamisCount;w++){
                window["KamisShowCatan" + w] = document.querySelector("#KamisShowCatan" + w);
                window["KamisShowCatan" + w].style.display = "none";
            };

            // Jumat
            for(let w = 1;w <= jumatCount;w++){
                window["JumatDeleteCatan" + w] = document.querySelector("#JumatDeleteCatan" + w);
                window["JumatDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= jumatCount;w++){
                window["JumatEditCatan" + w] = document.querySelector("#JumatEditCatan" + w);
                window["JumatEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= jumatCount;w++){
                window["JumatShowCatan" + w] = document.querySelector("#JumatShowCatan" + w);
                window["JumatShowCatan" + w].style.display = "none";
            };

            // Saptu
            for(let w = 1;w <= saptuCount;w++){
                window["SaptuDeleteCatan" + w] = document.querySelector("#SaptuDeleteCatan" + w);
                window["SaptuDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= saptuCount;w++){
                window["SaptuEditCatan" + w] = document.querySelector("#SaptuEditCatan" + w);
                window["SaptuEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= saptuCount;w++){
                window["SaptuShowCatan" + w] = document.querySelector("#SaptuShowCatan" + w);
                window["SaptuShowCatan" + w].style.display = "none";
            };

            // Minggu
            for(let w = 1;w <= mingguCount;w++){
                window["MingguDeleteCatan" + w] = document.querySelector("#MingguDeleteCatan" + w);
                window["MingguDeleteCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= mingguCount;w++){
                window["MingguEditCatan" + w] = document.querySelector("#MingguEditCatan" + w);
                window["MingguEditCatan" + w].style.display = "inline";
            };
            for(let w = 1;w <= mingguCount;w++){
                window["MingguShowCatan" + w] = document.querySelector("#MingguShowCatan" + w);
                window["MingguShowCatan" + w].style.display = "none";
            };

        });

        user.addEventListener("click",function () {
            user.style.display = "none";
            repair.style.display = "inline";

            // Senin
            for(let w = 1;w <= seninBaris;w++){
                window["SeninDeleteCatan" + w] = document.querySelector("#SeninDeleteCatan" + w);
                window["SeninDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= seninBaris;w++){
                window["SeninEditCatan" + w] = document.querySelector("#SeninEditCatan" + w);
                window["SeninEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= seninBaris;w++){
                window["SeninShowCatan" + w] = document.querySelector("#SeninShowCatan" + w);
                window["SeninShowCatan" + w].style.display = "inline";
            };

            // Selasa
            for(let w = 1;w <= selasaCount;w++){
                window["SelasaDeleteCatan" + w] = document.querySelector("#SelasaDeleteCatan" + w);
                window["SelasaDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= selasaCount;w++){
                window["SelasaEditCatan" + w] = document.querySelector("#SelasaEditCatan" + w);
                window["SelasaEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= selasaCount;w++){
                window["SelasaShowCatan" + w] = document.querySelector("#SelasaShowCatan" + w);
                window["SelasaShowCatan" + w].style.display = "inline";
            };

            // Rabu
            for(let w = 1;w <= rabuCount;w++){
                window["RabuDeleteCatan" + w] = document.querySelector("#RabuDeleteCatan" + w);
                window["RabuDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= rabuCount;w++){
                window["RabuEditCatan" + w] = document.querySelector("#RabuEditCatan" + w);
                window["RabuEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= rabuCount;w++){
                window["RabuShowCatan" + w] = document.querySelector("#RabuShowCatan" + w);
                window["RabuShowCatan" + w].style.display = "inline";
            };

            // Kamis
            for(let w = 1;w <= kamisCount;w++){
                window["KamisDeleteCatan" + w] = document.querySelector("#KamisDeleteCatan" + w);
                window["KamisDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= kamisCount;w++){
                window["KamisEditCatan" + w] = document.querySelector("#KamisEditCatan" + w);
                window["KamisEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= kamisCount;w++){
                window["KamisShowCatan" + w] = document.querySelector("#KamisShowCatan" + w);
                window["KamisShowCatan" + w].style.display = "inline";
            };

            // Jumat
             for(let w = 1;w <= jumatCount;w++){
                window["JumatDeleteCatan" + w] = document.querySelector("#JumatDeleteCatan" + w);
                window["JumatDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= jumatCount;w++){
                window["JumatEditCatan" + w] = document.querySelector("#JumatEditCatan" + w);
                window["JumatEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= jumatCount;w++){
                window["JumatShowCatan" + w] = document.querySelector("#JumatShowCatan" + w);
                window["JumatShowCatan" + w].style.display = "inline";
            };

            
            // Saptu
            for(let w = 1;w <= saptuCount;w++){
                window["SaptuDeleteCatan" + w] = document.querySelector("#SaptuDeleteCatan" + w);
                window["SaptuDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= saptuCount;w++){
                window["SaptuEditCatan" + w] = document.querySelector("#SaptuEditCatan" + w);
                window["SaptuEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= saptuCount;w++){
                window["SaptuShowCatan" + w] = document.querySelector("#SaptuShowCatan" + w);
                window["SaptuShowCatan" + w].style.display = "inline";
            };

            // Minggu
            for(let w = 1;w <= mingguCount;w++){
                window["MingguDeleteCatan" + w] = document.querySelector("#MingguDeleteCatan" + w);
                window["MingguDeleteCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= mingguCount;w++){
                window["MingguEditCatan" + w] = document.querySelector("#MingguEditCatan" + w);
                window["MingguEditCatan" + w].style.display = "none";
            };
            for(let w = 1;w <= mingguCount;w++){
                window["MingguShowCatan" + w] = document.querySelector("#MingguShowCatan" + w);
                window["MingguShowCatan" + w].style.display = "inline";
            };

        });

    </script>
@endsection