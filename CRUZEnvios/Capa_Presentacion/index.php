<?php
//incluir controladores y verificr existencia de usuario
include './controladore/Controladore.php';
include './../Capa_Negocio/Negocio.php';
$Negocio=new Negocio();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Estilos de Home-->
        <link rel="stylesheet" href="./Estilos/Index.css">
        <!-- Fuentes -->
        <link rel="stylesheet" href="./ModalesLibrerias/Modales.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="./Estilos/Ultimate2012UICSS/NotificacionUi.css">
<link rel="stylesheet" href="./Estilos/Ultimate2012UICSS/Estadist_Info.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!--Iconos Boostrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="./ModalesLibrerias/Modalesx.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <title>Home</title>
    </head>

    <body>
    <div class="BodyInfoNotification" >
      <div class="Info_Notification" id="Div_Fire" >

      </div>
    </div>
    
      <?php
      include '../Capa_Presentacion/ModalesLibrerias/Modales.php';
      ?>
        <div class="contendor-Grid">
        <!--- cabecera-->
<?php include '../Capa_Presentacion/Plantilla/header.php'; ?>
<!-- Fina Cabecera-->
<!-- Menu-->
<?php
include '../Capa_Presentacion/Plantilla/Menu.php';
?>
<!-- Fin Menu-->
<!-- Conetendor Menu-->
<main class="Menu-Contenido"  id="Contenedor"  >
  <div class="Menu-Titulo">
    <h2> 
    <?php
  echo "Bienvenido : ". $resulSession;    
?>
    </h2>
  </div>
  <div class="Menu-Cartas">
    <div class="carta">
      <div class="carta-item">
        <h2> Total de Envios</h2>
        <span class="material-icons-outlined">local_shipping</span>
      </div>
      <?php
      $rutaCompleta = '..\Capa_Negocio\Negocio.php';
      require_once $rutaCompleta;
      $ClaseNeg= new Negocio();
      $totalEnvios= $ClaseNeg->obtenervalor(1);
      ?>
      <h1><?php echo $totalEnvios ?> </h1>
    </div>
    <div class="carta">
      <div class="carta-item">
        <h2> Envios Pendientes de Confirmacion</h2>
        <span class="material-icons-outlined">info</span>
 

      </div>
      <?php
      $rutaCompleta = '..\Capa_Negocio\Negocio.php';
      require_once $rutaCompleta;
      $ClaseNeg= new Negocio();
      $totalEnvios= $ClaseNeg->obtenervalor(1);
      ?>
      <h1><?php echo $totalEnvios ?> </h1>
    </div>
    <div class="carta">
      <div class="carta-item">
        <h2> Envios Confirmados </h2>
        <span class="material-icons-outlined">check_circle</span>
      </div>
      <?php
      $rutaCompleta = '..\Capa_Negocio\Negocio.php';
      require_once $rutaCompleta;
      $ClaseNeg= new Negocio();
      $totalEnvios= $ClaseNeg->obtenervalor(1);
      ?>
      <h1><?php echo $totalEnvios ?> </h1>
    </div>
    <div class="carta">
      <div class="carta-item">
        <h2> Envios Completados </h2>
        <span class="material-icons-outlined">home</span>
      </div>
      <?php
      $rutaCompleta = '..\Capa_Negocio\Negocio.php';
      require_once $rutaCompleta;
      
      $ClaseNeg= new Negocio();
      $totalEnvios= $ClaseNeg->obtenervalor(2);
      ?>
      <h1><?php echo $totalEnvios ?> </h1>
  
    </div>
    <div class="carta">
      <div class="carta-item">
        <h2> Envios Retrasados </h2>
        <i class="material-icons-outlined">warning</i>

      </div>
      <?php
      $rutaCompleta = '..\Capa_Negocio\Negocio.php';
      require_once $rutaCompleta;
      $ClaseNeg= new Negocio();
      $totalEnvios= $ClaseNeg->obtenervalor(3);
      ?>
      <h1><?php echo $totalEnvios ?> </h1>
    </div>
    
  </div>
  <div class="products">
    <div class="product-card">
      
      <h2 class="product-description">Radar de Estadistica y Novedades
      <i class="material-icons-outlined">notifications</i>

      </h2> 
      
      <div class="List_Div" >
        <div>
        <h1>Cliente mas Activo <i class="material-icons-outlined">favorite</i>
         </h1>
         <p>Informacion...</p>
        </div>
        <div>
        <h1>Cliente mas Activo <i class="material-icons-outlined">favorite</i>
         </h1>
         <p>Informacion...</p>
        </div>
        <div>
        <h1>Cliente mas Activo <i class="material-icons-outlined">favorite</i>
         </h1>
         <p>Informacion...</p>
        </div>
        <div>
        <h1>Cliente mas Activo <i class="material-icons-outlined">favorite</i>
         </h1>
         <p>Informacion...</p>
        </div>
      </div>
     
    </div>

    <div class="social-media">
     
    </div>
</main>
<!-- Final Menu-->
        </div>
        <script src=".\JS\Despliegue_Notificaciones.js"></script>
        <script>

window.addEventListener('load',function(){
    var parametro = new URLSearchParams(window.location.search);
        if (parametro.has("Mensaje")) {      
            AbrirModal(parametro.get("Mensaje"),0);
        };
});

window.addEventListener('load',function(){
  var p = new URLSearchParams(window.location.search);
  if(p.has("R")){
   let div=document.getElementById("Contenedor");
   div.style.backgroundColor="black"; 
  }
});



</script>

<script  src=".\Estilos\UltimateDesingUiSystemJs\UIAnimations.JS" >
</script>
<script>
var animations= new AnimationsUi();

animations. OnfireNotification();

</script>
    </body>
</html>