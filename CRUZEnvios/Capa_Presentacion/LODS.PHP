<?php
include './controladore/Controladore.php';
include(__DIR__.'./../Capa_Negocio/Negocio.php');
$Negocio=new Negocio();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LODS</title>
    <link rel="stylesheet" href="./Estilos/Index.css">
    <link rel="stylesheet" href=".\Estilos\LODS1.css"/>
    <link rel="stylesheet" href="./ModalesLibrerias/Modales.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!--Iconos Boostrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
 
</head>
<body>
<div id="Modal" class="Fondo-Modal">
    <div class="ModalContenido">
        <div class="ContenidoModalCuerpo">
            <div class="M-Titulo">
             
                <div class="Columna">
                    <h3> Notificacion</h3>
                   
                </div> 
                <div class="Columna1">
                    <button  onclick="AbrirModal('',1)" class="boton-CerrarM"> X</button>
                </div>     
                 </div>    
                 <div class="CuerpoModal">
                    <div class="Columnax1" >
                        <i class="material-icons icono-info" style="font-size: 80px;">info</i>
                    </div>
                    <div class="Columnax1">
                        <div class="ContenidoColumna">
                            <h4> Notificacion</h4>
                            <p id="MensajeModal"> Este es una Prueba de un Modal</p>
                        </div>
                    </div>


                 </div>
                 <div class="FooterModal">

                 </div>
        </div>

    </div>
</div>
<?php include './Plantilla/Modal_Editar_LOST.php' ?>
        <div class="contendor-Grid">
        <!--- cabecera-->
<?php
include './Plantilla/header.php';
?>
<!-- Fina Cabecera-->
<!-- Menu-->
<?php
include './Plantilla/Menu.php';
?>
<!-- Fin Menu-->
<!-- Conetendor Menu-->
<main class="Menu-Contenido"  id="Contenedor" style="padding:0;margin:0 ;" >
    <div class="Contenedor" class="Contenedor" style="padding:0;margin:0;border:1px solid aliceblue" >
        <div class="titulo">
        <h1 style="padding:0;margin:0" >LISTA DE ORDENES DE SERVICIOS DE  <?php echo  $resulSession ?> </h1>
        </div>
        <form id="FormListar"  method = "post"  > 
        <div  class="Panel-Control"  >
            <div class="Item1" > 
            <label>Recibido  en :  </label>
                <select name="Destino1" >Seleccione Destino
                  <option value="" >TODOS</option>
              <?php
                $SelectAgencias= $Negocio->Agencias();
              if (is_array($SelectAgencias)) {
              //traer el metodo
           foreach($SelectAgencias as $Opciones) {
              ?>                           
                <option><?php echo $Opciones["Destino"] ?> </option>
                <?php
} 
}
    if (is_string($SelectAgencias)) {
    echo "error en : ".$SelectAgencias;
    } 
                ?>
                </select>
            </div >
            <div class="Item2" >
            <label>Remitente :  </label>
            <input type="text" name="Remitente" placeholder="DNI del Remitente"/>
            <label>Destinatario  :  </label>
            <input type="text" name="Destinatario" placeholder="DNI del Destinatario"/>
            </div>
            <div class="Item3" >
            <label>Fecha de envio :  </label>
            <input type="date" name="Fecha_Envio" />
            <label>Fecha de Recepcion :  </label>
            <input type="date" name="Fecha_Recepcion" />
            </div>
            <div class="Item4">
                <input type="hidden" name="txtBtnBuscar" value="Buscar" >
                <button type="submit"  id="BtnBuscar" name="BtnBuscar" value="Buscar" >Buscar</button>
            </div>
        </div>
        </form>
        <div  style="overflow: auto;" class="resulta-tabla" >
            
          <table  id="TblResult" >
            <thead>
                <tr>
                    <th>Nro. Orden</th>
                    <th>Remitente</th>
                    <th>Destinatario</th>
                    <th>Hora envio</th>
                    <th>Estado</th>
                    <th>DESTINO</th>
                    <th>Hora Recibo</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Fecha_Envio</th>
                    <th>Fecha_Recepcion</th>
                    <th >Acciones</th>
                </tr>
            </thead>
           <tbody id="bodytable" >
             

                </tbody>

  
             
          </table>  

        </div>
</div>    
</main>
        </div>
        <script src="./ModalesLibrerias/Modalesx.js"></script>
<script src="./JS/jqueryV3.1.JS"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
        <script src="./JS/Despliegue_Notificaciones.js"></script>
        </script>   
        <script src=".\JS\Modificaciones.js">
        </script>
        <script src="./JS/Busquedas.js" >
    </script>
         <script src="./JS/LOST.js">  
        </script>
        <script src="./JS/Editar_Registro.js">
        </script>
        <script src="./JS/listar_Registros.js">   
  </script>
  <script>
    //cuando el formulario tenga un envio de datos 
    //detener la carga... y ejecutar el metodo
    var form =document.getElementById("FormListar");
    form.addEventListener('submit',(formsub)=>{
        formsub.preventDefault();
        listarRegistros("bodytable","FormListar");
    });

  </script>
       
     
         
</body>
</html>