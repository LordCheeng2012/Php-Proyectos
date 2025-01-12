function Activar(contadorid) {
    // Obtiene el elemento por su ID
    var opcionElement = document.getElementById("Opcion"+contadorid);
    if (opcionElement.classList.contains("ActivarD")) {
      opcionElement.classList.remove("ActivarD");
    }else{
    // Verifica si el elemento existe
    if (opcionElement) {
        // Agrega la clase "Activar-Detalles"
        opcionElement.classList.add("ActivarD");
        //rellenar los inputs para actualizar registro  de la tabla
        
        //Editar Registros Rellenando los  campos segun el ID seleccionado
        //nos ayudaremos del contadorID como referencia
        let tabla=document.getElementById("TblResult");
          var datos=[];
          
          //seleccionar todos los elementos que contiene la tabla en su
          //tbody dentro de ella acceder a los tr Y Recorremos cada una de sus 
          //Filas
          tabla.querySelectorAll("tbody tr").forEach(Filas => {
            var ArrayDatos=[];//Creamos un arreglo
            //ahora cuando estemos en cada elemento tr ,
            // vamos a acceder dentro del bucle
            // a cada fila le extraemos sus td para acceder a sus datos 
            //ya que dentro de cada tr hay un td por Fila
           
            Filas.querySelectorAll("td").forEach((celdas) => {
              //agregamos al arreglo que creamos 
              ArrayDatos.push(celdas.textContent)
               //agregamos el arreglo a una arregllo global
            });
            datos.push(ArrayDatos);
           });
         //el valor inicial del contador es 1 entonces , para apuntar 
         //al dato correcto debemos imprimir el valor del cont con el del array 
         //pero restandole 1 recordando que los Arrays empiesan en 0
           console.log(datos);
            //ahora ya obtenido los daatos simplmente vamos a  llenar los input con esos valores
           var Dni,Destino,FechaEdicion,id;
            let NCotizacion=document.getElementById('TxtCoti');
           Dni=document.getElementById("TxtDniNuevo");
           Destino=document.getElementById("DdlDestinoEdit");
           FechaEdicion=document.getElementById("txtFechaEdit");
           id=document.getElementById('lblID').textContent=datos[contadorid][0];
           Dni.value=parseInt(datos[contadorid][1]);
           Destino.value=datos[contadorid][5].toString().trim();
           NCotizacion.value=datos[contadorid][8]*2;
           console.log(datos[contadorid][5].toString());

           //llenamos el input fecha
           var Fecha= new Date();
           var Dia =Fecha.getDate() < 10 ? "0"+Fecha.getDate():Fecha.getDate();
           var Mes =(Fecha.getMonth()+1) < 10 ? "0"+(Fecha.getMonth()+1):Fecha.getMonth()+1;
           var Año = Fecha.getFullYear();
          FechaEdicion.value=Año+"-"+Mes+"-"+Dia;
        console.log("Clase agregada correctamente");
    } 
  }
        }