@extends('default.bosstrap')

@section('main')
<div class="container">

    {{-- modall Create --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border: none">
                <div class="modal-header" style="background-color:#379237">
                    <h1 class="modal-title fs-5 text-light" id="modalCreate">Buat Catatan Mingguan</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formCreate">
                    @csrf
                    <div class="modal-body">
                        {{-- <input type="hidden" name="hari" id="dataHari" value=""> --}}
                        {{-- Judul --}}
                        <input type="judul" class="form-control fw-bold mb-2    x"
                            placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off"
                            required value="{{ old(" judul") }}" maxlength="25" >
                        {{-- Hari --}}
                        <div class="d-flex mb-1" style="flex-wrap: wrap">
                            <div style="border:2px solid #0F6292;color:#0F6292;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded">Senin</div>
                            <div style="border:2px solid #913175;color:#913175;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded">Selasa</div>
                            <div style="border:2px solid #D61355;color:#D61355;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded">Rabu</div>
                            <div style="border:2px solid #F99417;color:#F99417;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded">Kamis</div>
                            <div style="border:2px solid #FF78F0;color:#FF78F0;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded">Jumat</div>
                            <div style="border:2px solid #FF7B54;color:#FF7B54;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded ">Saptu</div>
                            <div style="border:2px solid #10A19D;color:#10A19D;cursor:pointer"
                                class="hariCreate fw-bold py-1 px-1 ms-0 m-1 rounded">Minggu</div>
                            <div class="pt-2 px-1 ms-0 m-1 rounded" id="pesanHari">Pilih Hari yang anda inginkan</div>
                        </div>

                        {{-- Body --}}
                        <input id="bodyCreate" type="hidden" name="body" value="{{ old(" body") }}">
                        <trix-editor input="bodyCreate" id="trixCreate" required placeholder="Text Body"></trix-editor>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="batalCreate" class="btn btn-danger"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="submitCreate" class="btn btn-success">
                            Buat
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="border: none" id="bodyModalDelete">
            </div>
        </div>
    </div>

    {{-- Modall Edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border: none">
                <div class="modal-header" style="background-color:#0F6292">
                    <h1 class="modal-title fs-5 text-light" id="modalEdit">Edit Catatan Mingguan
                    </h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="editModalBody">
                    
                </div>

            </div>
        </div>
    </div>
   


    <div class="modal fade"  id="modalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable">
          <div class="modal-content" style="border: none">
            <div id="modalBodyShow" class="modal-body">
            </div>
           </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-11 d-flex rounded justify-content-between">
            <div class="">
                <a href="/Sekilas"><img src="/img/iconSekilasKecil.png" alt="Sekilas"></a>
                <a href="/Penting"><img src="/img/iconPentingKecil.png" alt="Penting"></a>
                <a href="/Mingguan"><img src="/img/iconKalenderKecil.png" alt="Mingguan"></a>
            </div>
            <div class="">
                <button id="repair" style="border: none;background:none;padding:0;">
                    <img src="/img/iconRepairKecil.png" alt="RepairCatatan">
                </button>
                <button id="user" style="border: none;background:none;padding:0;display:none">
                    <img src="/img/iconUserKecil.png" id="imgRepair" alt="RepairCatatan">
                </button>
                <button data-bs-toggle="modal" data-bs-target="#modalCreate"
                    style="border: none;background:none;padding:0;">
                    <img src="/img/iconTambah.png" alt="TambahCatatan">
                </button>
            </div>
        </div>
    </div>

    <div class="row justify-content-evenly">
        @for ($i = 0; $i < 7; $i++) 

        <div class="{{($i == 1 || $i == 4) ? "col-md-4" : "col-md-3"}} mt-3 rounded ">
            <div class="shadow rounded">
                <p class="text-center text-light fs-3 rounded-top" 
                @if($i == 0) style="background-color:#0F6292;margin-bottom:-16px"
                @elseif($i == 1) style="background-color:#913175;margin-bottom:-16px"
                @elseif($i == 2) style="background-color:#D61355;margin-bottom:-16px"
                @elseif($i == 3) style="background-color:#F99417;margin-bottom:-16px"
                @elseif($i == 4) style="background-color:#FF78F0;margin-bottom:-16px"
                @elseif($i == 5) style="background-color:#FF7B54;margin-bottom:-16px"
                @else style="background-color:#10A19D;margin-bottom:-16px"
                @endif
                >
                @if($i == 0) Senin
                @elseif($i == 1) Selasa
                @elseif($i == 2) Rabu
                @elseif($i == 3) Kamis
                @elseif($i == 4) Jumat
                @elseif($i == 5) Saptu
                @else Minggu
                @endif
                <p>

                {{-- Button --}}
                <div id="{{ $harinya[$i] }}Container">
                @foreach($dataMingguan->where("hari",$harinya[$i]) as $catatannya)
                
                            <div id="bar{{ $catatannya->id }}" class="d-flex justify-content-between align-items-center border-bottom" 
                                style="background-color: #F7F5EB">
                                <h6 id="nameBar{{ $catatannya->id }}" class="fs-6 px-1 py-2 mb-0">{{ $catatannya->title }}</h6>
                                <div>
                                    {{-- Show --}}
                                    <button class="showButton spawnShow fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                                        data-bs-toggle="modal" data-id="{{ $catatannya->id }}"  data-bs-target="#modalShow">
                                        <i class="bi bi-eye showButton"  data-id="{{ $catatannya->id }}"  ></i></button>

                                    {{-- Edit --}}
                                    <button class="editButton spawnEdit fs-6 px-1 py-2 mb-0"
                                        style="border:none;background:none;display:none" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit" data-id="{{ $catatannya->id }}"
                                        >
                                        <i class="editButton bi bi-pencil-square" 
                                        data-bs-target="#modalEdit" 
                                        data-bs-toggle="modal"
                                        data-id="{{ $catatannya->id }}"

                                        ></i></button>
                                    {{-- Delete --}}
                                    <button class="deleteButton spawnDelete fs-6 px-1 py-2 mb-0"
                                        style="border:none;background:none;display:none" style="submit"
                                        data-bs-toggle="modal" data-id="{{ $catatannya->id }}" data-bs-target="#deleteModal">
                                        <i class="deleteButton bi bi-trash"  data-id="{{ $catatannya->id }}"></i>
                                    </button>
                                </div>
                            </div>
                            
                    @endforeach
                </div>
                @if($dataMingguan->where("hari",$harinya[$i])->count() < 5)
                    <div id="wadah{{ $harinya[$i] }}Penambah">
                        @for($a = 0;$a < 5 - $dataMingguan->where("hari",$harinya[$i])->count();$a++)
                            <h6 style="background-color: #F7F5EB" class="{{ $harinya[$i] }}Penambah fs-6 px-1 py-2 mb-0 border-bottom">-</h6>
                        @endfor
                    </div>
                @endif
                
                <div 
                @if($i == 0) style="background-color:#0F6292;"
                @elseif($i == 1) style="background-color:#913175;"
                @elseif($i == 2) style="background-color:#D61355;"
                @elseif($i == 3) style="background-color:#F99417;"
                @elseif($i == 4) style="background-color:#FF78F0;"
                @elseif($i == 5) style="background-color:#FF7B54;"
                @else style="background-color:#10A19D;"
                @endif
                class="rounded-bottom py-1"></div>
            </div>

        </div>

        @endfor
    </div>

</div>

<script src="js/mingguan.js"></script>

@endsection