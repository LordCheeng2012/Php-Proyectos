
   <?php  if (isset($AbrirModal) && $AbrirModal==true){$claseactive="activeModal_Cont";}else{echo "";}?>
<div id="Modal" class="Modal" >
<link rel="stylesheet"
 href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 <link rel="stylesheet" href="./css/Modal_Notificacion.css">
<div class="Modal_Cont <?php echo $claseactive ?> " >
    <div class="Titulo" >
        <strong><h1>Resultado-Cita:<?php echo $ID_Paciente ?></h1></strong>
    </div>
    <div class="Detalles_Cita  " >
        <div class="Detalles" >
            <h2>Fecha de Cita <span class="material-symbols-outlined">event</span>
             :<?php echo $Fecha_Cita ?> </h2>
            <h2>Hora de Cita <span class="material-symbols-outlined">schedule</span> :
            <?php echo $Hora_Cita ?> </h2>
            <h2> Especialidad <span class="material-symbols-outlined">how_to_reg</span>:
            <?php echo $Especialidad ?> </h2>
            <h2>Doctor <span class="material-symbols-outlined">stethoscope</span>:
            <?php echo $Doctor ?>  </h2>
        </div>
        <div class="Footer_Modal" >
            <h1>Estado de Cita :<?php echo $Mensage ?> </h1> 
            <button id="btn_CierraModal" >Aceptar</button>       
        </div>

    </div>


</div>
<script>
        var btn_CierraModal=document.getElementById('btn_CierraModal');
        btn_CierraModal.addEventListener('click',function () {
            let modal=document.getElementById('Modal');
            modal.style.display='none';
        })

    </script>
</div>