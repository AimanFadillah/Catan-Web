<nav class="navbar shadow mb-5 navbar-dark fixed-top" 
    style="background-color:#674188">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/"><i class="bi bi-pen"></i>Ca<span style="color: #30E3DF" >tan</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" style="background-color: #674188" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel"><i class="bi bi-pen"></i>Ca<span style="color: #30E3DF" >tan</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @guest
            <li class="nav-item">
              <a class="nav-link active" style="margin-left: 3px" aria-current="page" href="/">Beranda</a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
              <a href="/Sekilas" type="button" class="btn fw-bold text-light" style="background-color: #F94A29;">
                Sekilas <span class="badge ms-1 text-bg-light">{{ $barisSekilas }}</span>
              </a>
            </li>
            <li class="nav-item mt-1">
              <a href="/Penting" type="button" class="btn fw-bold text-dark" style="background-color: #FCE22A;">
                Penting <span class="badge ms-1 text-bg-light">{{ $barisPenting }}</span>
              </a>
            </li>
            <li class="nav-item mt-1">
              <a href="/Mingguan" type="button" class="btn fw-bold text-light" style="background-color: #379237;">
                Mingguan <span class="badge ms-1 text-bg-light">{{ $barisMingguan }}</span>
              </a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-light mt-5 p-1 fw-bold" style="color:#674188" >Logout</button>
              </form>
            </li>
            @endauth

            {{-- dropdown --}}
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> --}}

          </ul>

          {{-- Searching --}}
          {{-- <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
        </div>
      </div>
    </div>
  </nav>