@extends('default.bosstrap')

@section('main')

    <div class="container">

        {{-- peringatan --}}
        @if (session()->has("gagal"))    
        <div class="row justify-content-center">
        <div class="col-md-11 alert alert-danger alert-dismissible fade show" role="alert">
          {{ session("gagal") }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
        @endif
        @if (session()->has("berhasil"))    
        <div class="row justify-content-center">
        <div class="col-md-11 alert alert-success alert-dismissible fade show" role="alert">
          {{ session("berhasil") }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
        @endif

        {{-- konten --}}
        <div class="row justify-content-center mb-1">
        <div class="col-md-11 rounded shadow py-1" style="background-color: #5837D0">
            <h1 class="text-light text-center"><span style="color: #30E3DF" >Fit</span>ur<i class="bi bi-pen"></i>Ca<span style="color: #30E3DF" >tan</span></h1>
        </div>
        </div>

      
        <div class="row justify-content-evenly mt-1"  >
            <div class="col-md-3 mt-3 shadow rounded d-flex align-items-center" style="background-color:#F94A29">
                <img src="img/iconSekilas.png">
                @guest
                <button class="ms-3 fs-5 text-light" style="background: none;border:none" data-bs-toggle="modal" data-bs-target="#exampleModal" >Sekilas</button>
                @endguest
                @auth
                <a href="/Sekilas" class="ms-3 fs-5 text-light text-decoration-none ">Sekilas</a>
                @endauth
            </div>
            {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="border: none">
                    <div class="modal-header" style="background-color:#F94A29">
                      <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Fitur Sekilas</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Fitur Sekilas berguna untuk catetan sekilas yang akan hilang ketika sudah 1 hari</p>
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-md-4 mt-3 shadow rounded d-flex align-items-center " style="background-color: #FCE22A">
                <img src="img/iconPenting.png">
                @guest
                <button class="ms-3 fs-5" style="background: none;border:none" data-bs-toggle="modal" data-bs-target="#exampleModal2" >Penting</button>
                @endguest
                @auth
                <a href="/Penting" class="ms-3 fs-5 text-dark text-decoration-none ">Penting</a>
                @endauth
            </div>

            {{-- modal --}}
            <div class="modal fade" id="exampleModal2" tab2index="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="border: none">
                    <div class="modal-header" style="background-color: #FCE22A">
                      <h1 class="modal-title fs-5 text-light" id="exampleModalLabel2">Penting</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Fitur Penting berguna untuk catetan penting sehingga catetan ini tidak akan hilang</p>
                    </div>
                  </div>
                </div>
              </div>


            <div class="col-md-3 mt-3 shadow rounded d-flex align-items-center " style="background-color: #379237">
                <img src="img/iconKalender.png">
                @guest
                <button class="ms-3 fs-5 text-light" style="background: none;border:none" data-bs-toggle="modal" data-bs-target="#exampleModal3" >Mingguan</button>
                @endguest
                @auth
                <a href="/Mingguan" class="ms-3 fs-5 text-light text-decoration-none ">Mingguan</a>
                @endauth

            </div>

             {{-- modal --}}
             <div class="modal fade" id="exampleModal3" tab2index="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content" style="border: none">
                    <div class="modal-header" style="background-color: #379237">
                      <h1 class="modal-title fs-5 text-light " id="exampleModalLabel3">Mingguan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Fitur Mingguan berguna untuk menyimpan catetan harian</p>
                    </div>
                  </div>
                </div>
              </div>

        </div>

      @guest
           
        <div class="row justify-content-center">
        <div class="col-md-11 mt-3 py-1 shadow rounded" style="background-color: #FF0032">
            <h1 class="text-center text-light"><span style="color: #30E3DF;" >Mas</span>uk<i class="bi bi-door-open"></i>Daf<span style="color: #30E3DF" >tar</span></h1>
        </div>
        </div>

        <div class="row justify-content-evenly mt-3">
            <div class="col-md-5 py-3 mb-3 shadow rounded" style="background-color: #8675A9;">
                <div class="d-flex justify-content-center mb-2">
                    <img src="img/iconMasuk.png">
                </div>
                <h4 class="text-center text-light" style="margin-bottom:64px" >Login</h4>
                <form action="/login" method="post" >
                  @csrf 
                {{-- email --}}
                <div class="form-floating">
                    <input type="email" class="form-control" placeholder="email" name="email" id="email-1" autofocus required autocomplete="off">
                    <label id="email-1" style="color: gray" >Gmail</label>
                </div>
                {{-- password --}}
                <div class="form-floating mt-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="password" name="password" id="password-1" autofocus required autocomplete="off">
                    <label id="password-1" style="color: gray" >Password</label>
                </div>
                {{-- submit --}}
                <button type="submit" style="width: 100%;background-color:#FFC93C" class="mt-3 rounded border-0 py-2 shadow fw-bold" >Masuk</button>
                </form>
            </div>

            <div class="col-md-5 mb-3 shadow rounded py-3" style="background-color: #769FCD" >
                <div class="d-flex justify-content-center">
                    <img src="img/iconDaftar.png">
                </div>
                <h4 class="text-center text-light" >Registrasi</h4>
                <form action="/daftar" method="post" >
                @csrf
                  {{-- email --}}
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="email" name="email" id="email-2" autofocus required autocomplete="off">
                    <label id="email-2" style="color: gray" >Gmail</label>
                </div>
                @error('email')
                        <div class="invalid-feed">
                            <p style="color:#FF0032"  class="ms-1 fs-6 fw-bold mt-1" >{{ $message }}</p>
                        </div>
                @enderror
                 {{-- name --}}
                  <div class="form-floating mt-2">
                    <input type="name" class="form-control @error('name') is-invalid @enderror " placeholder="name" name="name" id="name" autofocus required autocomplete="off">
                    <label id="name" style="color: gray" >Name</label>
                </div>
                @error('name')
                        <div class="invalid-feed">
                            <p style="color:#FF0032"  class="ms-1 fs-6 fw-bold mt-1" >{{ $message }}</p>
                        </div>
                @enderror
                {{-- password --}}
                <div class="form-floating mt-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="password" name="password" id="password-2" autofocus required autocomplete="off">
                    <label id="password-2" style="color: gray" >Password</label>
                </div>
                {{-- submit --}}
                <button type="submit" style="width: 100%;background-color:#FFC93C" class="mt-3 rounded border-0 py-2 shadow fw-bold" >Daftar</button>
                </form>
            </div>
        </div>
      
      @endguest
     

    </div>

@endsection