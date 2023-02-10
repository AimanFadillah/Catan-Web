let senin = document.querySelector("#senin");
let selasa = document.querySelector("#selasa");
let rabu = document.querySelector("#rabu");
let kamis = document.querySelector("#kamis");
let jumat = document.querySelector("#jumat");
let saptu = document.querySelector("#saptu");
let minggu = document.querySelector("#minggu");

let pesan = document.querySelector("#pesan");
let hari = document.querySelector(".hari");

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


