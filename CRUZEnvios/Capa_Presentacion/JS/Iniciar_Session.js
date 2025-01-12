
//inportar las clases

import { Informaciones } from 
"../Estilos/UltimateDesingUiSystemJs/Informaciones.js";
/// -----///

// obtener elementos del doom
    var form = document.getElementById("FormLogin");
    let btnLogin = document.getElementById("btnLogin");
    var InFodiv = document.getElementById("InfoDiv");
    let img = document.getElementById("imgImg");
    var loaddiv=document.getElementById("divLoad");
    //ejecutamos un evento

    form.addEventListener('submit',function(formEvent){
        //desactivamos postback de carga al form
        formEvent.preventDefault();
        //iniciamos la clase formdata para nuestro form
        let FormDatos= new FormData(form);
      
        //verificamos los datos

        if ((FormDatos.get('txtDni') == "" || FormDatos.get('txtContra') == "") || 
            (FormDatos.get('txtDni') =="" && FormDatos.get('txtContra') == "")) { 
             InFodiv.classList.remove("Success");
            InFodiv.classList.add("Error");
            loaddiv.classList.remove("loader");
            InFodiv.classList.add("ActiveInfo");         
            const Info=new Informaciones("error");
            Info.MensajeDiv('H1MnsgeInfo','PrfMsg',
                'Error','Algunos o todos los campos están vacíos');
        } else {
             InFodiv.classList.remove("Error");        
             img.remove();
             loaddiv.classList.add("loader");
             loaddiv.classList.add("ActiveInfo");
         InFodiv.classList.add("ActiveInfo");   
        const Info=new Informaciones("Success");
        Info.MensajeDiv('H1MnsgeInfo','PrfMsg',
        'Un Momento..','Verificando información del Usuario al servidor..');
        console.log("se envio el form");
        //console.log("DNI USER : " + FormDatos.get('TxtDni'));
        //console.log("Contraseña User : " + FormDatos.get('txtContra'));  
        //_____enviar datos al servidor___

        fetch('./Procedimientos/Iniciar_Session.php',{
            method:'POST',
            body:FormDatos //enviamos el cuerpo del form 
            //en el servidor llamamos solo los nombres de los inputs
        })
        //Si el metodo devuelve promesa y es correcto
        //convertimos el resultado en formato json
                .then(resolve=>resolve.json())
                .then(res=>{
       //console.log(res);
                 if(res.Estado==true){
                  
                    Info.MensajeDiv('H1MnsgeInfo','PrfMsg',
                    res.Mensaje,
                    'Verificando información del Usuario al servidor..');
                    setTimeout(() => {
                        window.location="./index.php";
                    }, 5000);
                }
                if(res.Estado==false){
                    InFodiv.classList.add("Error");
                    loaddiv.classList.remove('loader');
                    Info.MensajeDiv('H1MnsgeInfo','PrfMsg',
                    res.Mensaje,'No se accedio al sistema');
                    setTimeout(() => {
                        loaddiv.classList.add('loader');
                        Info.MensajeDiv('H1MnsgeInfo','PrfMsg',
                    res.Mensaje,'Redirigiendo al usuario , un momento..');
                 
                        setTimeout(() => {
                            window.location="./Login.html"; 
                        }, 2000);
                    }, 5000);
                }
                   
                })
                .catch(error=> console.log("error : "+ error));
         }
        // fin else
       
    });







