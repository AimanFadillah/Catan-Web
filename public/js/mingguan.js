
let dataHari;
const pesanHari = document.querySelector("#pesanHari");
const bodyModalDelete = document.querySelector("#bodyModalDelete");
const modalBodyShow = document.querySelector("#modalBodyShow");
const editModalBody = document.querySelector("#editModalBody");
const token = document.querySelector(`meta[name="csrf-token"]`).getAttribute("content")

document.addEventListener("click", (e) => {


    if (e.target.classList.contains("hariCreate")) {
        const hari = e.target;
        if (hari.id === "hariTerpilih") {
            hari.removeAttribute("id");
            hari.style.color = hari.style.backgroundColor;
            hari.style.backgroundColor = "white"
            dataHari = undefined;
            pesanHari.style.display = "block";
            return false;
        }
        const warnaHari = hari.style.color;
        const hariTerpilih = document.querySelector("#hariTerpilih")
        pesanHari.style.display = "none"
        hari.style.backgroundColor = warnaHari;
        hari.style.color = "white";
        hari.setAttribute("id", "hariTerpilih");
        dataHari = hari.innerText.toLowerCase();

        if (hariTerpilih) {
            hariTerpilih.style.color = hariTerpilih.style.backgroundColor
            hariTerpilih.style.backgroundColor = "white";
            hariTerpilih.removeAttribute("id")
        }
    }

    if (e.target.classList.contains("showButton")) {
        modalBodyShow.innerHTML =
            `
        <div class="d-flex justify-content-center" >
            <div class="spinner-border" style="width: 3rem; height: 3rem;color:#674188" role="status">
            </div>
        </div>
        `
        const id = e.target.getAttribute("data-id")
        fetch(`/Mingguan?find=${id}`)
            .then(response => response.json())
            .then(data => {
                modalBodyShow.innerHTML =
                    `
            <div class="d-flex justify-content-between align-items-center">
                <div></div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-center px-5 fs-3 mb-4 fw-bold pt-0" style="margin-top: -30px;word-wrap: break-word;" >${data.judul}</div>
            <div style="word-wrap: break-word; " class=" text-left" > ` + data.body + ` </div>
            `
            })

    }

    if (e.target.classList.contains("editButton")) {
        let id = e.target.getAttribute("data-id");
        editModalBody.innerHTML =
        `
        <div class="d-flex justify-content-center" >
            <div class="spinner-border" style="width: 3rem; height: 3rem;color:#674188" role="status">
            </div>
        </div>
        `
        fetch("/Mingguan?find=" + id)
            .then(response => response.json())
            .then(data => {
                editModalBody.innerHTML =
                    `
                    <form id="formUpdate" >
                        <input type="hidden" name="_method" value="PUT" >
                        <input type="text" id="editJudul" class="form-control fw-bold mb-2 "
                            placeholder="Judul Catatan" name="judul" id="judul" maxlength="25" autocomplete="off"
                            value="${data.judul}"
                            required >
                            <input id="editBody" type="hidden" name="body" value="` + data.body + `" >
                            <trix-editor input="editBody" required id="trixEditBody" placeholder="Text Body"></trix-editor>
                    </div>
                    <div class="modal-footer">
                    <button type="button" id="noUpdate" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="yesUpdate" data-id="${id}" class="btn btn-success">Update</button>
                    </form>
                     `
            })
    }

    if(e.target.id === "yesUpdate"){
        e.preventDefault();
        const buttonUpdate = e.target;
        const id = buttonUpdate.getAttribute("data-id")
        const buttonClose = document.querySelector("#noUpdate");
        const formUpdate = document.querySelector("#formUpdate")
        const editBody = document.querySelector("#editBody");
        const editJudul = document.querySelector("#editJudul");
        const trixEditBody = document.querySelector("#trixEditBody");
        if(editJudul.value === ""){
            editJudul.setAttribute("placeholder","Judul harus diisi")
            return;
        }
        if(editBody.value === ""){
            trixEditBody.setAttribute("placeholder","Text Body belum Di isi")
            return;
        }
        buttonUpdate.disabled = true;
        buttonUpdate.innerHTML = 
        `
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Update
        `
        fetch(`/Mingguan/${id}`,{
            method:"post",
            body:new FormData(formUpdate),
            headers:{
                "X-CSRF-TOKEN" : token,
            }
        })
        .finally(() => {
            buttonUpdate.disabled = false;
            buttonUpdate.innerHTML = `Update`
            buttonClose.click()
        })
        .then(response => response.json())
        .then(data => {
            const nameBar = document.querySelector(`#nameBar${data.id}`)
            nameBar.innerText = data.title;
        })
         
    }

    if (e.target.classList.contains("deleteButton")) {
        bodyModalDelete.innerHTML =
            `
        <div class="modal-body rounded-top">
                <h1 class="modal-title fs-5" id="deleteModal">Yakin ingin <span style="color: #F55050" >Hapus</span> Catatan Mingguan ini?</h1>
        </div>
        <form id="formDelete" method="post">
            <input type="hidden" name="_method" value="delete">
            <div class="d-flex align-items-center p-1 px-2 justify-content-evenly pt-3" style="margin-top: -20px"  >
                <button type="button" class="btn btn-danger" id="noDelete" data-bs-dismiss="modal">Batal</button>
                <button type="submit" data-id="${e.target.getAttribute("data-id")}" id="yesDelete" class="btn btn-success ms-1">Yakin</button>
            </div>
        </form>
        `
    }

    if (e.target.id === "yesDelete") {
        e.preventDefault()
        const submitDelete = e.target;
        const formDelete = document.querySelector("#formDelete")
        const noDelete = document.querySelector("#noDelete")
        submitDelete.disabled = true;
        submitDelete.innerHTML =
            `
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Yakin
        `;
        fetch(`/Mingguan/${e.target.getAttribute("data-id")}`, {
            method: "post",
            body: new FormData(formDelete),
            headers: {
                "X-CSRF-TOKEN": token,
                "X-HTTP-Method-Overidden": "DELETE"
            }
        })
            .finally(() => {
                submitDelete.disabled = false;
                submitDelete.innerHTML = "Yakin"
                noDelete.click()
            })
            .then(response => response.json())
            .then(data => {
                const bar = document.querySelector(`#bar${data.id}`)
                const Container = document.querySelector(`#${data.hari}Container`)
                Container.removeChild(bar)
                if (data.count < 5) {
                    const wadahPenambah = document.querySelector(`#wadah${data.hari}Penambah`)
                    wadahPenambah.innerHTML +=
                        `
                <h6 style="background-color: #F7F5EB" class="${data.hari}Penambah fs-6 px-1 py-2 mb-0 border-bottom">-</h6>
                `
                }
            })
    }


})


// Mode Admin

const repair = document.querySelector("#repair");
const user = document.querySelector("#user");


repair.addEventListener("click", function () {
    repair.style.display = "none";
    user.style.display = "inline";

    const showButton = document.querySelectorAll(".spawnShow")
    const deleteButton = document.querySelectorAll(".spawnDelete")
    const editButton = document.querySelectorAll(".spawnEdit")


    deleteButton.forEach((detol, i) => {
        deleteButton[i].style.display = "inline";
        editButton[i].style.display = "inline";
        showButton[i].style.display = "none";
    })

});

user.addEventListener("click", function () {
    clickUser()
});

function clickUser() {
    user.style.display = "none";
    repair.style.display = "inline";

    const showButton = document.querySelectorAll(".spawnShow")
    const deleteButton = document.querySelectorAll(".spawnDelete")
    const editButton = document.querySelectorAll(".spawnEdit")
    let urutan = 0;
    for (detol of deleteButton) {
        deleteButton[urutan].style.display = "none";
        editButton[urutan].style.display = "none";
        showButton[urutan].style.display = "inline";
        urutan++
    }
}

// Update
const formCreate = document.querySelector("#formCreate");
const submitCreate = document.querySelector("#submitCreate")
const batalCreate = document.querySelector("#batalCreate")
const bodyCreate = document.querySelector("#bodyCreate")
const trixCreate = document.querySelector("#trixCreate")


formCreate.addEventListener("submit", (e) => {
    e.preventDefault()
    const dataCreate = new FormData(formCreate)
    if (!dataHari) {
        return false;
    } else {
        dataCreate.append('hari', dataHari);
    }

    if (!bodyCreate.value || bodyCreate.value === "") {
        trixCreate.setAttribute("placeholder", "Text Body ini belum disi")
        return false;
    }

    submitCreate.disabled = true;
    submitCreate.innerHTML =
        `
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Buat
    `
    fetch("/Mingguan", {
        method: "post",
        body: dataCreate,
        headers: {
            "X-CSRF-TOKEN": token,
        }
    })
        .finally(() => {
            const hariTerpilih = document.querySelector("#hariTerpilih")
            submitCreate.disabled = false;
            submitCreate.innerHTML = `Buat`
            batalCreate.click();
            formCreate.reset();
            clickUser();
            if (hariTerpilih) {
                hariTerpilih.style.color = hariTerpilih.style.backgroundColor
                hariTerpilih.style.backgroundColor = "white";
                hariTerpilih.removeAttribute("id");
                pesanHari.style.display = "block"
            }
        })
        .then(response => response.json())
        .then((data) => {
            const Penambah = document.querySelectorAll(`.${dataHari}Penambah`);
            const wadahPenambah = document.querySelector(`#wadah${dataHari}Penambah`)
            const Container = document.querySelector(`#${dataHari}Container`)
            if (Penambah[0]) {
                wadahPenambah.removeChild(Penambah[0])
            }
            Container.innerHTML +=
                `
            <div id="bar${data.id}" class="d-flex justify-content-between align-items-center border-bottom" 
                style="background-color: #F7F5EB">
                <h6 id="nameBar${data.id}" class="fs-6 px-1 py-2 mb-0">${data.title}</h6>
                <div>
                <button class="showButton spawnShow fs-6 px-1 py-2 mb-0" style="border:none;background:none"
                data-bs-toggle="modal" data-id="${data.id}"  data-bs-target="#modalShow">
                <i class="bi bi-eye showButton"  data-id="${data.id}"  ></i></button>

                <button class="editButton spawnEdit fs-6 px-1 py-2 mb-0"
                style="border:none;background:none;display:none" data-bs-toggle="modal"
                data-bs-target="#modalEdit" data-id="${data.id}"
                >
                <i class="editButton bi bi-pencil-square" 
                data-bs-target="#modalEdit" 
                data-bs-toggle="modal"
                data-id="${data.id}"

                ></i></button>

                    <button class="deleteButton spawnDelete fs-6 px-1 py-2 mb-0"
                        style="border:none;background:none;display:none" style="submit"
                        data-bs-toggle="modal" data-id="${data.id}" data-bs-target="#deleteModal">
                        <i class="deleteButton bi bi-trash"  data-id="${data.id}"></i>
                    </button>
                </div>
            </div>
            `
        })



})