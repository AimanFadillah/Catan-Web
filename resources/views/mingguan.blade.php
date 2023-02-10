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

         {{-- modall Create --}}
        <div class="modal fade"  id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content" style="border: none">
                <div class="modal-header"  style="background-color:#379237">
                  <h1 class="modal-title fs-5 text-light" id="modalCreate">Buat Catatan Mingguan</h1>
                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/Mingguan" method="post">
                    @csrf
                    <div class="modal-body">
                      
                        <input type="hidden" name="hari" class="hari" value="" >
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
                      <button type="submit" class="btn btn-success">Buat</button>
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
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Senin{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                        {{-- Button --}}
                       
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
                                data-bs-toggle="modal" data-bs-target="#SeninEdit{{ $loop->iteration }}" id="SeninEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    style="submit"
                                    id="SeninDeleteCatan{{ $loop->iteration }}"
                                    data-bs-toggle="modal" data-bs-target="#seninH{{ $loop->iteration }}"
                                    >
                                    <i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                         {{-- Modal Hapus --}}
                        <div class="modal fade"  id="seninH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="seninH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px"  >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modall Edit --}}
                        <div class="modal fade"  id="SeninEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#0F6292">
                                  <h1 class="modal-title fs-5 text-light" id="SeninEdit{{ $loop->iteration }}">Edit Catatan Hari Senin</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="SeninBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="SeninBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Selasa{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       {{-- Button --}}
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
                                data-bs-toggle="modal" data-bs-target="#SelasaEdit{{ $loop->iteration }}" id="SelasaEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                    <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="SelasaDeleteCatan{{ $loop->iteration }}"
                                    data-bs-toggle="modal" data-bs-target="#selasaH{{ $loop->iteration }}"
                                    type="submit">
                                    <i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                         {{-- Modal Hapus --}}
                         <div class="modal fade"  id="selasaH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="selasaH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px"   >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modall Edit --}}
                        <div class="modal fade"  id="SelasaEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#913175">
                                  <h1 class="modal-title fs-5 text-light" id="SelasaEdit{{ $loop->iteration }}">Edit Catatan Hari Selasa</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="SelasaBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="SelasaBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Rabu{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
                                </div>
                               </div>
                            </div>
                        </div>

                       {{-- button --}}
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
                                data-bs-toggle="modal" data-bs-target="#RabuEdit{{ $loop->iteration }}" id="RabuEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                    <button
                                    type="submit"
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    data-bs-toggle="modal" data-bs-target="#rabuH{{ $loop->iteration }}"
                                    id="RabuDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                        {{-- Modal Hapus --}}
                        <div class="modal fade"  id="rabuH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="rabuH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px" >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                         <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modall Edit --}}
                        <div class="modal fade"  id="RabuEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#D61355">
                                  <h1 class="modal-title fs-5 text-light" id="RabuEdit{{ $loop->iteration }}">Edit Catatan Hari Rabu</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="RabuBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="RabuBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Kamis{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
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
                                data-bs-toggle="modal" data-bs-target="#KamisEdit{{ $loop->iteration }}" id="KamisEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                    <button
                                    type="submit"
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    data-bs-toggle="modal" data-bs-target="#kamisH{{ $loop->iteration }}"
                                    id="KamisDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                        
                        {{-- Modal Hapus --}}
                        <div class="modal fade"  id="kamisH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="kamisH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items -center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px" >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modall Edit --}}
                        <div class="modal fade"  id="KamisEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#F99417">
                                  <h1 class="modal-title fs-5 text-light" id="KamisEdit{{ $loop->iteration }}">Edit Catatan Hari Kamis</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="KamisBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="KamisBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Jumat{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
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
                                data-bs-toggle="modal" data-bs-target="#JumatEdit{{ $loop->iteration }}" id="JumatEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                    <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    data-bs-toggle="modal" data-bs-target="#jumatH{{ $loop->iteration }}"
                                    id="JumatDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                               
                            </div>
                        </div>

                          {{-- Modal Hapus --}}
                          <div class="modal fade"  id="jumatH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="jumatH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3"  style="margin-top: -20px" >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modal Edit --}}
                        <div class="modal fade"  id="JumatEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#FF78F0">
                                  <h1 class="modal-title fs-5 text-light" id="JumatEdit{{ $loop->iteration }}">Edit Catatan Hari Jumat</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="JumatBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="JumatBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Saptu{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
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
                                data-bs-toggle="modal" data-bs-target="#SaptuEdit{{ $loop->iteration }}" id="SaptuEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                    <button
                                    type="submit"
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    data-bs-toggle="modal" data-bs-target="#saptuH{{ $loop->iteration }}"
                                    id="SaptuDeleteCatan{{ $loop->iteration }}">
                                    <i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                        {{-- Modal Hapus --}}
                        <div class="modal fade"  id="saptuH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="saptuH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px"  >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                         <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modal Edit --}}
                        <div class="modal fade"  id="SaptuEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#FF7B54">
                                  <h1 class="modal-title fs-5 text-light" id="SaptuEdit{{ $loop->iteration }}">Edit Catatan Hari Saptu</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="SaptuBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="SaptuBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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

            {{-- Mingguan --}}
            <div class="col-md-4 mt-3 rounded ">
                <div class="shadow rounded">
                    <p class="text-center text-light fs-3 rounded-top" style="background-color:#10A19D;margin-bottom:-16px">Minggu<p>
                        @foreach($minggu as $catatannya)
                        {{-- modal Show --}}
                        <div class="modal fade"  id="Minggu{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" style="border: none">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div></div>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="text-center  fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px" >{{ $catatannya->judul }}</div>
                                    <div style="word-wrap: break-word; " class=" text-left" >{!! $catatannya->body !!}</div>
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
                                data-bs-toggle="modal" data-bs-target="#MingguEdit{{ $loop->iteration }}" id="MingguEditCatan{{ $loop->iteration }}" >
                                <i class="bi bi-pencil-square"></i></i></button>
                                {{-- Delete --}}
                                   <button
                                    class="fs-6 px-1 py-2 mb-0" style="border:none;background:none;display:none"
                                    id="MingguDeleteCatan{{ $loop->iteration }}"
                                    data-bs-toggle="modal" data-bs-target="#mingguH{{ $loop->iteration }}"
                                    >
                                    <i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                         {{-- Modal Hapus --}}
                         <div class="modal fade"  id="mingguH{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content" style="border: none">
                                <div class="modal-body rounded-top">
                                <h1 class="modal-title fs-5" id="mingguH{{ $loop->iteration }}">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
                                </div>
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px"  >
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-1">Yakin</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- Modal Edit --}}
                        <div class="modal fade"  id="MingguEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content" style="border: none">
                                <div class="modal-header"  style="background-color:#10A19D">
                                  <h1 class="modal-title fs-5 text-light" id="MingguEdit{{ $loop->iteration }}">Edit Catatan Hari Minggu</h1>
                                  <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                
                                <form action="/Mingguan/{{ $catatannya->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">
                                      
                                        <input type="hidden" name="hari" class="hari" value="" >
                                         {{-- Judul --}}
                                        <input type="judul" class="form-control fw-bold mb-2 @error('judul') is-invalid @enderror " placeholder="Judul Catatan" name="judul" id="judul" autofocus required autocomplete="off" required value="{{ old("judul",$catatannya->judul) }}">
                                      

                
                                      {{-- Body --}}
                                      <input id="MingguBody{{ $loop->iteration }}" type="hidden" name="body" value="{{ old("body",$catatannya->body) }}" >
                                      <trix-editor input="MingguBody{{ $loop->iteration }}" required placeholder="Text Body @error("body")ini belum disi @enderror" ></trix-editor>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                                
                              </div>
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

    <script src="js/mingguan.js"></script>
   
@endsection