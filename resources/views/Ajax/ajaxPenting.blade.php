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

                      <div class="col-md-12 pt-2 pb-1 my-1 text-center shadow rounded" style="background-color: #BFACE2">
                        <h6>Catatan Tidak ditemukan</h6>
                      </div>

@endif