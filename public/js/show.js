let primary = document.querySelector("#primary");
let info = document.querySelector("#info");
let success = document.querySelector("#success");
let danger = document.querySelector("#danger");
let warning = document.querySelector("#warning");
let normal = document.querySelector("#normal");

let konten = document.querySelector("#konten");

primary.addEventListener("click",function () {
    localStorage.setItem("temaPenting","primary");
    localStorage.removeItem("backgroundColorPenting");
    localStorage.removeItem("colorPenting");
    konten.style.backgroundColor = "none";
    konten.style.color = "white";
    konten.classList.add("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

info.addEventListener("click",function () {
    localStorage.setItem("temaPenting","info");
    localStorage.removeItem("backgroundColorPenting");
    localStorage.removeItem("colorPenting");
    konten.style.backgroundColor = "none";
    konten.style.color = "black";
    konten.classList.remove("bg-primary");
    konten.classList.add("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

success.addEventListener("click",function () {
    localStorage.setItem("temaPenting","success");
    localStorage.removeItem("backgroundColorPenting");
    localStorage.removeItem("colorPenting");
    konten.style.backgroundColor = "none";
    konten.style.color = "white";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.add("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

danger.addEventListener("click",function () {
    localStorage.setItem("temaPenting","danger");
    localStorage.removeItem("backgroundColorPenting");
    localStorage.removeItem("colorPenting");
    konten.style.backgroundColor = "none";
    konten.style.color = "white";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.add("bg-danger");
    konten.classList.remove("bg-warning");
});

warning.addEventListener("click",function () {
    localStorage.setItem("temaPenting","warning");
    localStorage.removeItem("backgroundColorPenting");
    localStorage.removeItem("colorPenting");
    konten.style.backgroundColor = "none";
    konten.style.color = "black";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.add("bg-warning");
});

normal.addEventListener("click",function () {
    localStorage.setItem("temaPenting","normal");
    localStorage.removeItem("backgroundColorPenting");
    localStorage.removeItem("colorPenting");
    konten.style.backgroundColor = "#F7F5EB";
    konten.style.color = "black";
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
});

// Local Storage
let showBodyPenting = document.querySelector("#showBodyPenting")
let colorButton = document.querySelector("#colorButton")
let textColorButton = document.querySelector("#textColorButton")
if(typeof(Storage) !== "undefined"){

    if(localStorage.getItem("backgroundColorPenting")){
        konten.style.backgroundColor = localStorage.getItem("backgroundColorPenting");
        colorButton.value = localStorage.getItem("backgroundColorPenting")
    }

    if(localStorage.getItem("fontSizePenting")){
        showBodyPenting.style.fontSize = localStorage.getItem("fontSizePenting");
    }

    if(localStorage.getItem("fontFamilyPenting")){
        konten.style.fontFamily = localStorage.getItem("fontFamilyPenting");
    }

    if(localStorage.getItem("temaPenting")){
        let temaPenting = localStorage.getItem("temaPenting")

        if(temaPenting === "normal"){
            konten.style.backgroundColor = "#F7F5EB";
            konten.style.color = "black";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        }

        if(temaPenting === "warning"){
            konten.style.backgroundColor = "#F7F5EB";
            konten.style.backgroundColor = "none";
            konten.style.color = "black";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.add("bg-warning");
        }

        if(temaPenting === "danger"){
            konten.style.backgroundColor = "none";
            konten.style.color = "white";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.add("bg-danger");
            konten.classList.remove("bg-warning");
        }

        if(temaPenting === "primary"){
            konten.style.backgroundColor = "none";
            konten.style.color = "white";
            konten.classList.add("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        };
        
        if(temaPenting === "info"){
            konten.style.backgroundColor = "none";
            konten.style.color = "black";
            konten.classList.remove("bg-primary");
            konten.classList.add("bg-info");
            konten.classList.remove("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        }
        
        if(temaPenting === "success"){
            konten.style.backgroundColor = "none";
            konten.style.color = "white";
            konten.classList.remove("bg-primary");
            konten.classList.remove("bg-info");
            konten.classList.add("bg-success");
            konten.classList.remove("bg-danger");
            konten.classList.remove("bg-warning");
        };



    }


    if(localStorage.getItem("colorPenting")){
        konten.style.color = localStorage.getItem("colorPenting");
        textColorButton.value = localStorage.getItem("colorPenting");
    }

}



let formShow = document.querySelector("#formShow")
let salinButton = document.querySelector("#salinButton")
let formDelete = document.querySelector("#formDelete")
let submitDelete = document.querySelector("#submitDelete")
let pdfButton = document.querySelector("#pdfButton")
let updateButton = document.querySelector("#updateButton")
let batalUpdateButton = document.querySelector("#batalUpdateButton")
let showJudulPenting = document.querySelector("#showJudulPenting")
let bodyInputUpdate = document.querySelector("#bodyInputUpdate")
let liveToast = document.querySelector("#liveToast")
let token = document.querySelector(`meta[name="csrf-token"]`).getAttribute("content")

textColorButton.addEventListener("input",() => {
    konten.style.color = textColorButton.value
    localStorage.removeItem("temaPenting");
    localStorage.setItem("backgroundColorPenting",konten.style.backgroundColor);
    localStorage.setItem("colorPenting",textColorButton.value);
})

colorButton.addEventListener("input",() => {
    konten.style.backgroundColor = colorButton.value;
    localStorage.removeItem("temaPenting");
    localStorage.setItem("backgroundColorPenting",colorButton.value);
    localStorage.setItem("colorPenting",textColorButton.value);
    konten.classList.remove("bg-primary");
    konten.classList.remove("bg-info");
    konten.classList.remove("bg-success");
    konten.classList.remove("bg-danger");
    konten.classList.remove("bg-warning");
})

salinButton.addEventListener("click",() => {
    if (konten.requestFullscreen) {
        konten.requestFullscreen();
    } else if (konten.mozRequestFullScreen) { /* Firefox */
        konten.mozRequestFullScreen();
    } else if (konten.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        konten.webkitRequestFullscreen();
    } else if (konten.msRequestFullscreen) { /* IE/Edge */
        konten.msRequestFullscreen();
    }
})

console.log(konten.style.backgroundColor)

pdfButton.addEventListener("click",() => {
    let pdf = new jsPDF('p', 'pt', 'letter');
    source = konten.innerHTML;
    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
        
    pdf.fromHTML(
        source, 
        margins.left, 
        margins.top, { 
            'width': margins.width, 
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            pdf.save(`${showJudulPenting.innerText}.pdf`);
        }, margins
    );


})
   
// Event Click WEb
document.addEventListener("click",(e) => {

    if(e.target.classList.contains("fontSize")){
        size = e.target.getAttribute("data-size");
        showBodyPenting.style.fontSize = size;
        localStorage.setItem("fontSizePenting",size);
    }

    if(e.target.classList.contains("fontStyle")){
        style = e.target.getAttribute("data-style");
        konten.style.fontFamily = style;
        localStorage.setItem("fontFamilyPenting",style);
    }

})

formDelete.addEventListener("submit",() => {
    submitDelete.disabled = true;
    submitDelete.innerHTML = 
    `
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Yakin
    `
})


formShow.addEventListener("submit",(e) => {
    e.preventDefault();
    if(!bodyInputUpdate.value){return bodyInputUpdate.setAttribute("placeholder","Text Body ini belum diisi") }
    updateButton.disabled = true;
    updateButton.innerHTML = 
    `
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Perbarui
    `
    fetch(`/catan/${updateButton.getAttribute("data-catan")}/update`,{
        method:"POST",
        body:new FormData(formShow),
        headers:{
            "X-CSRF-TOKEN" : token,
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
        showJudulPenting.innerText = hasil.judul;
        showBodyPenting.innerHTML = hasil.body;
    })

})
