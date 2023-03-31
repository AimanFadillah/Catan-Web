    
let container = document.getElementById("nyari");
let cari = document.getElementById('mencari');
let loading = document.getElementById('loading');
let load = document.querySelector("#load");
let formPenting = document.querySelector("#formPenting")
let kontenPenting = document.querySelector("#kontenPenting")
let token = document.querySelector(`meta[name="csrf-token"]`).getAttribute("content")
let textareaTrix = document.querySelector("#textareaTrix");
let batalCreate = document.querySelector("#batalCreate");
let penutupCatanPenting = document.querySelector("#penutupCatanPenting");
let buatCreatePenting = document.querySelector("#buatCreatePenting");
let ToastDelete = document.querySelector("#ToastDelete");
let toastLiveExample = document.querySelector('#liveToast')
let isScrolling;
let page = 1;


        loading.style.display = "none";

cari.addEventListener("keyup",function () {
    setTimeout(() => { 
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
    },500)      
})



dataCatanPenting(page)

if(ToastDelete){
    let toastnyaDelete = new bootstrap.Toast(ToastDelete)
    toastnyaDelete.show()
}

formPenting.addEventListener("submit",(e) => {
    e.preventDefault();
    if(!textareaTrix.value){
        return textareaTrix.setAttribute("placeholder","Text Body ini Belum di isi");
    }
    buatCreatePenting.disabled = true
    buatCreatePenting.innerHTML = 
    `
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Buat
    `
    fetch("/Penting",{
        method:"post",
        body:new FormData(formPenting),
        headers:{
            "X-CSRF-TOKEN" : token
        }
    })
    .finally(() => {
        formPenting.reset()
        batalCreate.click()
        buatCreatePenting.disabled = false;
        buatCreatePenting.innerHTML = "Buat";
        textareaTrix.setAttribute("placeholder","Text Body");
        let toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    })
    .then(response => response.json())
    .then(hasil => {
        createCatanPenting(hasil)
    })
})

window.addEventListener("scroll",scrollHandler)

// Function Function 

function dataCatanPenting (page){
    load.classList.toggle("d-flex")
    load.classList.toggle("d-none")
    fetch(`/Penting?d=penting&page=${page}`)
        .finally(() => {
            load.classList.toggle("d-flex")
            load.classList.toggle("d-none")
        })
        .then(response => response.json())
        .then(data => {
            let jumlahSlotPenting = data.data.length - 10;
            let nomor = 1;
            if(data.data.length ===  30){
                listCatan(data,jumlahSlotPenting,nomor)
            }else if(data.data.length !==  30){
                listCatan(data,jumlahSlotPenting,nomor)
                window.removeEventListener("scroll",scrollHandler)
            }else{
                window.removeEventListener("scroll",scrollHandler)
            }
        })
}

function scrollHandler () {
    if (isScrolling) {
        window.clearTimeout(isScrolling);
    }
    isScrolling = setTimeout(function() {
    if (window.scrollY + window.innerHeight >= document.body.offsetHeight) {
        page++;
        dataCatanPenting(page);
        kontenPenting.style.height = "auto";
    }
    }, 200);
};

function listCatan(data,jumlahSlotPenting,nomor){
    for(hasil of data.data){
        let a = document.createElement("a");
        a.classList.add("col-md-10","text-decoration-none","text-dark","py-2","shadow","d-flex","justify-content-between","align-items-center","border-bottom");
        a.style.backgroundColor = "#F7F5EB"
        if(nomor == 1){
            a.setAttribute("id","pertama")
        }
        a.setAttribute("href",`/Penting/${hasil.id}`)
        a.innerHTML = 
        `
        <h5 class="fw-bold" >${hasil.title}</h5>
        <h6>${hasil.tanggalFormat}</h6>
        `
        kontenPenting.insertBefore(a,penutupCatanPenting)
        nomor = 0
    }
    if(jumlahSlotPenting < 0){
        idCatanKosong = 0;
        if(jumlahSlotPenting == -10){idCatanKosong = 1}
        for(let a = 0;a > jumlahSlotPenting;a--){
            let divSlotPenting = document.createElement("div");
            divSlotPenting.classList.add("slotPenting","col-md-10","text-decoration-none","text-dark","py-2","shadow","d-flex","justify-content-between","align-items-center","border-bottom");
            divSlotPenting.style.backgroundColor = "#F7F5EB"
            if(idCatanKosong == 1){divSlotPenting.setAttribute("id","pertama")}
            divSlotPenting.innerHTML = 
            `
            <h5 class="fw-bold" >-</h5>
            `
            kontenPenting.insertBefore(divSlotPenting,penutupCatanPenting)
            idCatanKosong = 0
        }
    }
}


function createCatanPenting (hasil) {
    let pertama = document.querySelector("#pertama");
    let slotPenting = document.querySelector(".slotPenting");
    let a = document.createElement("a");
    a.classList.add("col-md-10","text-decoration-none","text-dark","py-2","shadow","d-flex","justify-content-between","align-items-center","border-bottom");
    a.style.backgroundColor = "#F7F5EB"
    a.setAttribute("id","pertama")
    a.setAttribute("href",`/Penting/${hasil.id}`)
    a.innerHTML = 
    `
    <h5 class="fw-bold" >${hasil.title}</h5>
    <h6>${hasil.tanggalFormat}</h6>
    `
    kontenPenting.insertBefore(a,pertama)
    if(slotPenting){
        kontenPenting.removeChild(slotPenting)
    }
    pertama.removeAttribute("id")
}
    