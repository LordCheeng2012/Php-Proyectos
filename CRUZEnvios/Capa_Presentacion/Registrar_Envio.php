<?php
$rutaCompleta = '..\Capa_Negocio\conexion_BD.php';
require_once $rutaCompleta;
include('./controladore/Controladore.php');

//controlar redirecciones de session
//recuerda que las tablas en html son asi 
// Thead son para los emcabesados titulos de las tablas 
//tr son las filas ___ ___  ; td son las columnas || |
//estas deben estar dentro de la etiqueta tbody o thead  
// Controlar redirecciones de sesión
// Traer nombre de usuario:

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href=".\Recursos\css\bootstrap.min.css">  
    <link rel="stylesheet" href=".\Estilos\Nuevo_Envios2.css">  
    <link rel="stylesheet" href="./ModalesLibrerias/Modales.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="./Estilos/Index.css">
        <!-- Fuentes -->     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href=".\Estilos\Ultimate2012UICSS\ModalsSystemsUl2012.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!--Iconos Boostrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="./ModalesLibrerias/Modalesx.js"></script>

         <script src="./JS/jqueryV3.1.JS"></script>
	<title>Nuevo Envio</title>
</head>
<body>	
	
<div id="Modal" class="Fondo-Modal">
            <div class="ModalContenido">
                <div id="BodyModal" class="ContenidoModalCuerpo">
                    <div class="M-Titulo">
                     
                        <div class="Columna">
                            <h3> Notificacion</h3>
                           
                        </div> 
                        <div class="Columna1">
                            <button class="boton-CerrarM"  onclick="AbrirModal('',1)"  > X</button>
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
                                    <div class="loader"></div>
                                </div>
                            </div>


                         </div>
                         <div class="FooterModal">

                         </div>
                </div>

            </div>
        </div>

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
<main class="Menu-Contenido"  id="Contenedor" style="background-color: #025939;
    border: 1px solid aliceblue;" >
<div class="Contenido">
<div class="title">
    <form  action=".\Procedimientos\Registrar_Envios.php" method="POST"
     onsubmit="return ValidarInput()"  >
    
	<h1 style="margin: initial;
    margin-left: 10px;" >Registrar Envios</h1>
</div>
	<div class="Cont-Padre">		
<div class="hijo">
	<div class="Sub-Container">
	<h3>Seleccione Destino</h3>
 <select class="form-select form-select-sm" 
 id="Destino" name="Destino" style="width: 400px;border-radius: 0;
    background-color: #8ae18a6b;
}">
 	 <?php
            //traemos conexion 
            if(!$conexion){
                //si falla la conexion;
                die("Conexión fallida: " . mysqli_connect_error());
            }
            $instruccion= "Select * from Agencias";
            //ejecutar consulta 
            $ejec=mysqli_query($conexion, $instruccion);
            if(!$ejec){
                     //si falla la consulta , verificando la conexion ;
                die("Consulta erronea: " . mysqli_error($conexion));
            }else{
                    while($datos=$ejec->fetch_assoc()){
                        $id=$datos["ID_DESTINO"];
                    $departamento=$datos["DEPARTAMENTO"];
                    $distrito=$datos["DISTRITO"];
                    $provincia=$datos["PROVINCIA"];
                    $Destino=$datos["DESTINO"];
                    //cerrar php
                    ?>
	<option  data-idDestino=<?php echo $id ?>  value=<?php echo $Destino ?>  <?php  if(isset($_GET['ID'])){ if( $_GET['ID']==$id) echo 'selected';}
     ?> > <?php echo $departamento ?>-<?php echo $distrito ?>-<?php echo $provincia ?>-<?php echo $Destino ?> </option>
                    <?php       
                    }
                }     
            ?>
 </select> 
 <!-- Aplicamos la clase .form-select-sm --> 
                    <!-- Mostrar Destino -->
                    <h5>Detalles de Destino:</h5>
                    <h6 id="h6Depart" >Departamento  :</h6>
                    <h6 id="h6Provinci" >Provincia  :  </h6>
                    <h6 id="h6Distri" >Distritos  :   </h6>
                    <h6 id="h6Desti" >Destino    :   </h6>                   
	</div>
	</div>
	<div class="hijo">
	<div class="Sub-Container">
                <!-- Formulario para ingresar los datos del envío-->
		<!-- Agregamos un titulo al formulario -->    
		<H4>Ingresar Datos del Destinatario</H4>
        <div class="mb-3" style="width: 405px">
            <label for="textBox" class="form-label">Ingresa Destinatario Dni:</label>
            <input  type="number" name="DniDesti" class="form-control"
             id="txtDni" minlength="8" maxlength="8" pattern="[0-9]{8}" title="Ingrese exactamente 8 dígitos numéricos" required>
           <div id="Resultado-Dni" class="Resultado-Lista"> 
                <div  class="Sub-ResDni">
                <p id="info-Dni"><strong>Nombre Completo: </strong></p>
                </div>
           </div>                      
        </div>
    </div>

	</div>
</div>
<div class="Fot">
	<div class="SubFooter">
    
            <label  for="selectOption"  style="margin-left: 10px;
    margin-top: 19px;">Seleccione Categoria:</label>

            <div class="Precio">
            <select style="will-change: auto;
    width: 44vh;
    margin-right: 165px; margin-top: 10px ; border-radius: 0;
    background-color: #8ae18a6b;"   class="form-select form-select-sm"
     onchange="TraePrecio(this)"
      name="Contenido" id="selectCont" > <!-- Aplicamos la clase .form-select-sm -->
            <?php
            //traemos conexion 
            if(!$conexion){
                //si falla la conexion;
                die("Conexión fallida: " . mysqli_connect_error());
            }
            $sql= "SELECT * FROM Categorias";
            //ejecutar consulta 
            $ejec=mysqli_query($conexion, $sql);
            if(!$ejec){
                     //si falla la consulta , verificando la conexion ;
                die("Consulta erronea: " . mysqli_error($conexion));
            }else{
                    while($datos=$ejec->fetch_assoc()){
                        $ID_Cat=$datos["ID_CATEGORIAS"];
                    $CATEGORIA=$datos["CATEGORIA"];
                    //cerrar php
                    ?>
                    <option   data-idPrecio="<?php echo $ID_Cat ?>" 
                    value=<?php echo $CATEGORIA ?> > 
                    <?php echo $CATEGORIA ?>
                    </option>
                   
                  <?php  
                    }
                }
                    ?>
                  
            </select>
           
                <h5 style="margin-left: 10px;
    margin-top: 19px">
               Precio : <input type="text" name="Precio" id="Precio"  style="width: 47px;
    background-color: #8ae18a6b;
    border: 0;" >
                </h5> 
            </div>   
            <label  for="selectOption" style="margin-left: 10px;
    margin-top: 19px;">Fecha de Envio:</label>
           <input type="Date" name="fecha_envio" id="fecha_envio" style="border-radius: 0;
    background-color: #8ae18a6b ; border:0; height: 5vh " >
           <label  for="selectOption"  style="margin-left: 10px;
    margin-top: 19px;">Hora de Envio:</label>
     <input style="border-radius: 0;
    background-color: #8ae18a6b;border:0; height: 5vh " type="time" name="hora_envio" id="hora_envio" >
    <button type="submit" name="Registrar"  class="Lista" style="grid-column: 1/3;
    width: 100%;"> Registrar Envio</button>


    </div>
	</div>
</div>
</form>
</main>
<!-- Final Menu-->
        </div>
        <script src="./JS/Despliegue_Notificaciones.js"></script>
        
        <script>

window.addEventListener('load',function(){
    var parametro = new URLSearchParams(window.location.search);
        if (parametro.has("Mensaje")) {      
            AbrirModal(parametro.get("Mensaje"),0);
        };
});

</script>
<script src="./JS/Funciones_Acciones.js" >
    </script>
 <script src="./JS/Mandar_Detalles_Destino.js">
    </script>
    <script src="./JS/Busquedas.js"></script>
    <script>
        ValidarInput();
        LLenarFechaActual();
    </script>
   
    <script>

        window.addEventListener('load',function(){
            var parametro = new URLSearchParams(window.location.search);
                if (parametro.has("Mensaje")) {      
                    AbrirModal(parametro.get("Mensaje"));
                };
        });
        
    </script>

   
  
</body>
</html>