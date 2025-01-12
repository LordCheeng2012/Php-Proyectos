  function Detalle_Registro_Id(ID_REGISTRO) {
    // Obtiene el elemento por su ID
    var Dni,Destino,FechaEdicion,opcionElement,NCotizacion,id_registro;
    //Asignar y obtener los elementos
    id_registro=document.getElementById("lblID");
    id_registro.textContent=ID_REGISTRO;
    opcionElement = document.getElementById("Opcion"+ID_REGISTRO);
    NCotizacion=document.getElementById('TxtCoti');
    Dni=document.getElementById("iptDni");
    Destino=document.getElementById("DdlDestinoEdit");
    FechaEdicion=document.getElementById("txtFechaEdit");
    if (opcionElement.classList.contains("ActivarD")) {
      opcionElement.classList.remove("ActivarD");
    }else{
    // Verifica si el elemento existe
    if (opcionElement) {
        // Agrega la clase "Activar-Detalles"
        opcionElement.classList.add("ActivarD");
       //Realizar la Consulta con el id del registro 
       $.ajax({
        url: './controladore/Cons_Informacion.php',
        type: 'GET',
        dataType: 'json',
        data: {
          Consulta:{id_registro:ID_REGISTRO,TB_From:"LOST"},
        },
        success: function (Registro) {
            // Obtener los elementos h6 y mostrar la información
                        //no arroja un array simple y accedemos por el indice
          if(Array.isArray(Registro)){
            Dni.value= Registro[0];
            NCotizacion.value=Registro[1];
          }else{
             console.log(Registro);
          }
            // Mostrar la información en los elementos correspondientes
        
            // Aquí podrías agregar código para recorrer el array JSON y asignar los valores a cada h6
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:');
            console.error('Estado:', status);
            console.error('Error:', error);
            console.error('Respuesta del servidor:', xhr.responseText);
            Precio.innerHTML = 'error:' + xhr.responseText;
        }
    });
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