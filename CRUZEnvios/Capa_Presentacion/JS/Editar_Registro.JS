 var Editar = document.getElementById('BtnConfirmar');
            Editar.addEventListener('click', function(){
              var id_orden=document.getElementById('lblID').textContent;
              let Peticion=Editar.value;
              var Dni,Destino,FechaEdicion;
            let NCotizacion=document.getElementById('TxtCoti');
           Dni=document.getElementById("iptDni");

           Destino=document.getElementById("DdlDestinoEdit");
           FechaEdicion=document.getElementById("txtFechaEdit");

              EditarRegistro(id_orden,Dni.value,Destino.value,NCotizacion.value)
          

            });