//menu despegable 
var MenuAbrir= false;
var Menu = document.getElementById("Menu");
var contador=0;




//definir funcion
//si menu abrir es false entonces...
function AbrirMenu() {
    if(!MenuAbrir){
        Menu.classList.add("sidebar-responsive");
        MenuAbrir=true;
    }
}

function Noti(listMenu) {
    //no se incrementa cuando se hace click el contador si no cuantas veces invocamoms 
    //la funcion Noti en el dom usando onclick
    let conte1 = document.getElementById("conte1");
    let conte2 = document.getElementById("conte2");
    let conte3 = document.getElementById("conte3");
    var click1 = document.getElementById("C1");
    var click2 = document.getElementById("C2");
    var click3 = document.getElementById("C3");  
    let Op1=document.getElementsByClassName("Op1");
    let Op2=document.getElementsByClassName("Op2");
    let Op3=document.getElementsByClassName("Op3");
    //esconder todos los ope 
    var listaope= 
        [Op1,Op2,Op3]
    ;

    for (let lista = 0; lista < listaope.length; lista++) {
        const opes = listaope [lista];
        //tenemos que interar dentro de oro bucle interno devido que 
        //opes es un array y si modificamos el stylo como queremoss le estaremos 
        //aplicando a listaope y no a cada elemento 
        //pero si iteramos una ves mas dentro de array creado interntamente podremos recien 
        //acceder a cada elemento de listaope
        for (let n = 0; n < opes.length; n++) {
            const Domelementos = opes[n];
            Domelementos.style.display="none";
        }
       
    }
    
    // Eliminar clases en todos los menús
    click1.classList.remove("Links1");
    click2.classList.remove("Links1");
    click3.classList.remove("Links1");
    conte1.classList.remove("Notificacion-Contenido");
    conte2.classList.remove("Notificacion-Contenido");
    conte3.classList.remove("Notificacion-Contenido");
    document.getElementById("NotiHeader").style.marginTop = '80px';

   
   // el contador ya seria 1 cuando se ejecuta la funcion 
  
    // Agregar clases según el menú seleccionado
    if (listMenu == 1) {
        click1.classList.add("Links1");
        conte1.classList.add("Notificacion-Contenido");
      
        for (let index = 0; index < Op1.length; index++) {
            element = Op1[index];
           element.style.display="block";
           
        }
        contador++;
    }   if(contador==2){
        click1.classList.remove("Links1");
        conte1.classList.remove("Notificacion-Contenido");
       contador=0;
       for (let array = 0; array < Op1.length; array++) {
        var ele = Op1[array];
       ele.style.display="none";
    }
       document.getElementById("NotiHeader").style.marginTop = '0px';
       return console.log("echo");
      }
        
       

    else if (listMenu == 2) {
        click2.classList.add("Links1");
        conte2.classList.add("Notificacion-Contenido");
       
        for (let index = 0; index < Op2.length; index++) {
            element = Op2[index];
           element.style.display="block";
           
        }
        contador++;
        if(contador==2){
            click2.classList.remove("Links1");
            conte2.classList.remove("Notificacion-Contenido");
           contador=0;
           for (let array = 0; array < Op2.length; array++) {
            var ele = Op2[array];
           ele.style.display="none";
        }
           document.getElementById("NotiHeader").style.marginTop = '0px';
           return console.log("echo");
          }
       
    }
       
     else if (listMenu == 3) {
       
        var element=0 ;
        click3.classList.add("Links1");
        conte3.classList.add("Notificacion-Contenido");
        contador++;
       
        //como es una coleccion debemos iterar sobre ellos
     for (let index = 0; index < Op3.length; index++) {
         element = Op3[index];
        element.style.display="block";
        
     }
     if(contador==2){

        click3.classList.remove("Links1");
        conte3.classList.remove("Notificacion-Contenido");
       contador=0;
       for (let array = 0; array < Op3.length; array++) {
        var ele = Op3[array];
       ele.style.display="none";
    }
       document.getElementById("NotiHeader").style.marginTop = '0px';
       return console.log("echo");
      }
     }  

   
   
}















