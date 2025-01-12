
function AbrirModal(Mensaje,Valor) {
    let Modal= document.getElementById("Modal");
    let MsgModal= document.getElementById("MensajeModal");
    var bodyModal=document.getElementById("BodyModal");
    //Asignar el mensaje a la ventana modal
    if(Valor==0){
        Modal.classList.add("activeModal");
        bodyModal.classList.remove('closeBodymodal');
        bodyModal.classList.add("ActiveCuerpoModal");
        Modal.style.color="aliceblue";
        MsgModal.innerHTML=Mensaje;
        
        return console.log("Se abrio el modal Correctamente ");
    }else if(Valor==1){
        bodyModal.classList.add('closeBodymodal');
      bodyModal.classList.remove("ActiveCuerpoModal");
        setTimeout(() => {
            Modal.classList.remove("activeModal");
            Modal.style.pointerEvents="none";
        }, 100);
   return console.log("Se cerro el modal Correctamente");
    }

//como usar setTimeout para ejecutar funciones en ciertos tiempos 
//primero defines tu funcion o lo puedes crear dentro de ese parametro 
//y el segundo parametro es el tiempo queq deses ejjecutar 

}

function ModalEdit(Activar) {
    let ContenedorModal= document.getElementById("ModalEdit");
    //Asignar el mensaje a la ventana modal
    if(Activar==0){
   ContenedorModal.classList.add("ActiveEdit");     
        return console.log("Se ejecuto Correctamente 0");
    }else if(Activar==1){
        ContenedorModal.classList.remove("ActiveEdit");   
   return console.log("Se ejecuto Correctamente");
    }
}
