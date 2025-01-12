

<?php 
include './Logica/Actualizar_Data.php';
?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="../css/Modal_Notificacion.css">
 <div id="DiVNoti"  class="Notificacion_Update" >
     <header class="Header_Noti" >
     <h1>Actualizando Datos  </h1> 
     <div id="DiVLoad" class="lds-dual-ring" ></div>
     </header>
     <div class="Body_Noti">
          <p id="prfResult">Un momento por favor</p>
          <P id="prfDetalle" ></P>
     </div>
 </div>

 <script>
     
     window.addEventListener('load',function(){
          var content =document.getElementById('DiVNoti');
          var prf=document.getElementById('prfResult');
          var DiVLoad=document.getElementById('DiVLoad');
          var prfDetalle=document.getElementById('prfDetalle');
          var Total= <?php echo $num; ?>;

          content.classList.add('Active');
          setTimeout(() => {
          DiVLoad.classList.replace('lds-dual-ring','Load');
          prf.textContent="Tienes : "+<?php echo $num; ?>+" Citas vencidas , <?php echo  $Mens ?> ";
          if(Total==0){
               prf.style.color="green"
          prfDetalle.style.color="green";
          prfDetalle.textContent ="No se han Detectado Citas Vencidas";
          }else{
          prf.style.color="red"
          prfDetalle.style.color="red";
          prfDetalle.textContent = "Tiene Citas que ya han sido vencidas , debera Coordinar con su Doctor Correspondiente.";
          }
          }, 3000);
          setTimeout(() => {
               content.classList.add('Close');
          }, 10000);
         
     });

 </script>