
function CargarPagina(url) {
  $("#Contenedor").load(url,function (data) {
    $(this).html(data);
    if (data=='./index.php') {
        let div =document.getElementById("Contenedor");
        div.style.backgroundColor="black";
    }else if (data !=='./index.php') {
      let div =document.getElementById("Contenedor");
        div.style.backgroundColor="#025939";
    }
  });
}
 //mandar este scipt para funcionalidades
 function ValidarInput() {
  //este evento se ejecuta en el evento onsubmit de un form
  var valor =document.getElementById("txtDni").value;
  let Inprecio=document.getElementById('Precio');

  if(/^\d{8}$/.test(valor)){
  if(Inprecio.value==""){
      alert ("Debe ingresar el precio del Paquete");
      return false;
  }
      alert("correcto");
      return true;
      }else{
         
          document.getElementById("txtDni").focus();
          return false;
  }
}

function LLenarFechaActual(){
  const Tiempo = new Date();
  var inputHora =document.getElementById("hora_envio")
  var inputFecha =document.getElementById("fecha_envio");
  //para que el formateo funcione primero debemos de parsear todas  las horas a string 
  //recuerda que en js es dinamico las conversiones no son nesesarias pueden concatenarse numeros con cadenas 
  var Hora = Tiempo.getHours() < 10 ? "0" + Tiempo.getHours() : Tiempo.getHours();
  var Minutos = Tiempo.getMinutes() < 10 ? "0" + Tiempo.getMinutes() : Tiempo.getMinutes();
  inputHora.value=Hora + ":" + Minutos;
  //llenar la fecha_envio
  
  //formato es aa/MM/dD
  //ojo el metodo getDay() retorna el numero de la semana actual 0 a 6 
  var Dia = Tiempo.getDate() < 10 ? "0" + Tiempo.getDate():Tiempo.getDate(); 
  //si el dia es menor a 10 lo coloca entre 0 y 9
  var Mes =(Tiempo.getMonth()+1) < 10 ? "0" +(Tiempo.getMonth()+1):Tiempo.getMonth()+1;
  var Año = Tiempo.getFullYear() ;
  inputFecha.value=Año+"-"+Mes+"-"+Dia;
}


