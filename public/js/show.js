let primary = document.querySelector("#primary");
let info = document.querySelector("#info");
let success = document.querySelector("#success");
let danger = document.querySelector("#danger");
let warning = document.querySelector("#warning");
let normal = document.querySelector("#normal");

let konten = document.querySelector("#konten");



primary.addEventListener("click",function () {
    konten.style.backgroundColor = "none";
    konten.style.color = "white";
    konten.classList.add("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

info.addEventListener("click",function () {
    konten.style.backgroundColor = "none";
    konten.style.color = "black";
    konten.classList.remove("bg-primary");
    konten.classList.add("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

success.addEventListener("click",function () {
    konten.style.backgroundColor = "none";
    konten.style.color = "white";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.add("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

danger.addEventListener("click",function () {
    konten.style.backgroundColor = "none";
    konten.style.color = "white";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.add("bg-danger");
    konten.classList.remove("bg-warning");
});

warning.addEventListener("click",function () {
    konten.style.backgroundColor = "none";
    konten.style.color = "black";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.add("bg-warning");
});

normal.addEventListener("click",function () {
    konten.style.backgroundColor = "#F7F5EB";
    konten.style.color = "black";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

let formShow = document.querySelector("#formShow")
let updateButton = document.querySelector("#updateButton")
let batalUpdateButton = document.querySelector("#batalUpdateButton")
let showJudulPenting = document.querySelector("#showJudulPenting")
let showBodyPenting = document.querySelector("#showBodyPenting")
let bodyInputUpdate = document.querySelector("#bodyInputUpdate")
let liveToast = document.querySelector("#liveToast")
let token = document.querySelector(`meta[name="csrf-token"]`).getAttribute("content")

formShow.addEventListener("submit",(e) => {
    e.preventDefault();
    if(!bodyInputUpdate.value){return bodyInputUpdate.setAttribute("placeholder","Text Body ini belum diisi") }
    updateButton.disabled = true;
    updateButton.innerHTML = 
    `
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Perbarui
    `
    fetch(`/Penting/${updateButton.getAttribute("data-catan")}/`,{
        method:"post",
        body:new FormData(formShow),
        headers:{
            "X-CSRF-TOKEN" : token,
            "X-HTTP-Method-Overidden" : "PUT"
        }
    })
    .finally(() => {
        updateButton.disabled = false;
        updateButton.innerHTML = 
        `
        Perbarui
        `
        bodyInputUpdate.setAttribute("placeholder","Text Body")
        let toast = new bootstrap.Toast(liveToast)
        toast.show()
        batalUpdateButton.click()
    })
    .then(response => response.json())
    .then(hasil => {
        showJudulPenting.innerHTML = hasil.judul;
        showBodyPenting.innerHTML = hasil.body;
    })

})
