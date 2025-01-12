//Messenger este archivo se encargar de enviar y traer todos los datos periodicamente
//desde mi servidor php que llama a su bd 
//la tecnica a utilisar es la tecnica nativa de long polling o sondeo 
//para poder simular actividad real
//primero creamos la funcion para enviar mensaje
function send_message(user,inputext,divClase,ID_divPadre) {

    //obtener los elementos del doom
    var  inputUser,salachat,divSession,divPadre,Id_chat;
    //el id del chat a enviar y guardar el mensaje
    Id_chat=document.getElementById("txtId_chat").value;
    divPadre=document.getElementById(ID_divPadre);
    // el input
    inputUser=document.getElementById(inputext);
    //el contenido del chat donde se mostrara todo los mensajes enviados
    salachat=document.createElement("div");
    salachat.className=divClase;
    //crea el tipo de mensaje , el usuario a enviar
    divSession=document.createElement("div");
    //como el que envia es el usuario logueado en cuestion se pone la clase directamente
    divSession.className="User_Session";
        // crear un p elemento para mostrar el mensaje
        var p=document.createElement("p");     
            
      //nuevo form
      var form= new FormData();
       form.append("User",user);
       form.append("id_chat",Id_chat);
       form.append("mensaje",inputUser.value); 
             //enviar el mensaje
            //manejar la logica y enviar al servidor
                fetch('./../../Plantilla/Messenger/SET_Mensajes.php',
                {
                    method: 'POST',
                    mode:"cors",
                    body:form
                }).then(
                    //recibir la respuesta del servidor
                    res=>res.json()
                ).then((dat)=>{//ya no se ejcuta el mensaje ya se probo que funciona
                    //console.log(dat);
                })
                   
                .catch((err)=>{console.log(err)});
                
                     //agregar el mensaje
        p.textContent=inputUser.value;
        //console.log(p);
        //insertarlo al dom dentro del div
        divPadre.append(salachat);
          salachat.append(divSession);
          divSession.append(p);
            //retornar resultados

}

//luego recibir mensaje

function Chat_Info(ID_CHAT){
    //FUNCION para pedir cargar todos los mensajes del chat segun su identificador
        var Id_chat=new FormData();
      
        var DivChat=document.getElementById("divcont");
        DivChat.innerHTML=`      
        <span class="loader"></span>      
        `;
        Id_chat.append("ID_CHAT",ID_CHAT);
            fetch('./../../Plantilla/Messenger/LoadChats_User.php',{
                method: 'POST',
                mode:"cors",
                body:Id_chat
            })
                .then(Res=>Res.json())
                .then((Data)=>{
                    DivChat.innerHTML=Data;
                    //enviar el id del chat a informacion chat para que tenga listo el dato
                    document.getElementById("txtId_chat").value=ID_CHAT;
                    //recibir mensajes
                    var ID_chat=document.getElementById("txtId_chat").value;
                    if(ID_chat==""){
                    console.log("no hay chat activado para recibir mensajes");
                        }else{
                                setInterval(() => {
                                // console.log("recibiendo mensajes..");
                                    get_message(ID_chat);
                                }, 2000);
                                }  
                                }).catch((err)=>{console.log(err)});

                }

function get_message(ID_CHAT){
    //FUNCION para pedir cargar todos los mensajes del chat segun su identificador
        var Id_chat=new FormData();
        Id_chat.append("ID_CHAT",ID_CHAT);
        var DivChat=document.getElementById("divcont");
    fetch('./../../Plantilla/Messenger/LoadChats_User.php',{
        method: 'POST',
        mode:"cors",
        body:Id_chat
    })
    .then(Res=>Res.json())
    .then((Data)=>{
        DivChat.innerHTML=Data;
          //enviar el id del chat a informacion chat para que tenga listo el dato
          document.getElementById("txtId_chat").value=ID_CHAT;
    }).catch((err)=>{console.log(err)});

}