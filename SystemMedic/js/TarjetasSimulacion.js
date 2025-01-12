

let tarjetas = {
    tarjeta1: 886963214587,
    Cvv1:7845,
    tarjeta2: 741236589632,
    Cvv2:6412,
}
console.log(tarjetas.tarjeta1);

function BuscaTarjeta() {
    let tarjeta = document.getElementById("txtNumTar");
    let Cvv = document.getElementById("txtCvv");
    let div =document.getElementById('divInfTar');
    let infotar=document.getElementById('h3InfNumTarj');
    if((tarjeta.value==tarjetas.tarjeta1) && (Cvv.value==tarjetas.Cvv1)){
        div.classList.add("active1");
        infotar.innerHTML="Numero de tarjeta : " + tarjetas.tarjeta1;
       
    }else if((tarjeta.value==tarjetas.tarjeta2) && (Cvv.value==tarjetas.Cvv2)){
        div.classList.add("active1");
        infotar.innerHTML="Numero de tarjeta : " + tarjetas.tarjeta2;
       
    }else{
        div.classList.remove("active1");
        alert("no se ah detectado nínguna tarjeta con los datos dadós");
    }
}

function ensureOneChecked(checkbox) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((box) => {
      if (box !== checkbox)
        box.checked = false;
        box.removeAttribute("required");
        if(box==checkbox)
            box.setAttribute("required", true);
    });
  }