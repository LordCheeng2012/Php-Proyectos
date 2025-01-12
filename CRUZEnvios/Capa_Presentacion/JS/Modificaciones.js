

function EditarRegistro(ID,DniDestinatario,Destino,NCotizacion) {
    $.ajax({
        url:'./controladore/Modificaciones.php',
        type:'POST',
        dataType:'json',
        data:{  Peticion:'Update',
                ID_Orden:ID,  
                Dni:DniDestinatario,
                Destino:Destino,
                Cotizacion:NCotizacion
        },
        })
        .done(function(resultado){
           //RESPONDER EL RESULTADO   
           //Usamos la libreria de SweetAlert
           Swal.fire({
            title: resultado,
            text: "Revise los detalles en Lista de ordenes de Servicio!",
            icon: "success"
          });  
                //cerrar el modaledit
                ModalEdit(1)        
        })
        .fail(function(Error){
            console.log("error:"+Error.responseText);
        })
}
    function EliminarRegistro(ID_Orden) {
        Swal.fire({
            title: "Estas Seguro?",
            text: "Este Registro no se podra Recuperar!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Anular Registro!"
          }).then((result) => {
            if (result.isConfirmed) {
                    //aqui la logica del succes
                    //USAMOS AJAX
            Datos={Peticion:'Delete',ID_Orden};         
            $.ajax({
                url: './controladore/Modificaciones.php' ,
                method : 'post' ,
                data: Datos ,
                dataType:'json'
            })
            .done(function(success){
                Swal.fire({
                    title: success,
                    text: "Revise los detalles en Lista de ordenes de Servicio!",
                    icon: "success"
                  }); 
            })
            .fail(function(error){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text:error.responseText,
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
                  console.log(error.responseText);

            });
            
             
            }
          });
            
    }


