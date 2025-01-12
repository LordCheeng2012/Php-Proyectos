
<?php
if(isset($ActivaModal)and $ActivaModal=='Modal_AlertShow' ){
$MensajeModal=$_GET['Modal_Mensaje'];
$MensageDetalle=$_GET['Modal_Detalle'];

?>


<link rel="stylesheet"
 href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 <link rel="stylesheet" href="./css/Modal_Notificacion.css">
<div class="Modal_Cont" >
    <div class="Titulo" >
        <strong><h1>Notificacion</h1></strong>
    </div>
    <div class="Detalles_Cita" >
        <div class="Detalles" >
           <H1>Atencion !</H1>
           <h3> Resultado de Consulta :<?php echo $MensajeModal;?></h3>
        </div>
        <div class="Footer_Modal" >
            <h1>Detalle :<?php echo $MensageDetalle ?> </h1> 
            <button id="btn_CierraModal" >Aceptar</button>       
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
<?php
}else{
    ?>
    <link rel="stylesheet"
 href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 <link rel="stylesheet" href="./css/Modal_Notificacion.css">

 <div class="Modal_Popup" id="ModalPopup" >
<div id="Modal_Cont" class="Modal_Cont" >
    <div class="Titulo" >
    <?php
    include './Logica/Datos_ResumenesCita.php';
 if($Resultado != false && $Resultado2!= false ){
    while (($Filas=$Resultado->fetch_assoc())  &&
     ($Filas2=$Resultado2->fetch_assoc()) && 
     ($Filas3=$Resultado3->fetch_assoc()) ) {
        ?>
    <h1> <i class="fa fa-search"></i>  Resumen de Cita Numero : <?php echo $Filas['Numero_Cita']; ?> </h1>

    </div>
    <div class="DetalleS_Resumen" >
    <div>
    <h2><i class="fa fa-calendar"></i> Fecha de Cita</h2>
    <h3><?php echo $Filas2['Fecha_Cita']; ?></h3>
    <h2><i class="fa fa-user"></i> Nombre del Paciente</h2>
    <h3><?php echo $Filas3['Nombres']." ". $Filas3['Apellidos'];?></h3>
    <h2><i class="fa fa-user-md"></i> Nombre del Médico</h2>
    <h3><?php echo $Filas2['Nombre_Doctor']." ".  $Filas2['Apellidos_Doctor']  ; ?></h3>
    <h2><i class="fa fa-stethoscope"></i> Especialidad</h2>
    <h3><?php echo $Filas2['Especialidad']; ?></h3>
    <h2><i class="fa fa-hospital-o"></i> Motivo de Consulta</h2>
    <h3><?php echo $Filas['Motivo_Consuta']; ?></h3>
    <h2><i class="fa fa-clock-o"></i> Fecha de Creación</h2>
    <h3><?php echo $Filas['Fecha_Cre_At']; ?></h3>
    <h2><i class="fa fa-hourglass-start"></i> Tiempo de Atención</h2>
    <h3><?php echo $Filas['Duracion']; ?></h3>
    <h2><i class="fa fa-file-text"></i> Recetario</h2>
    <h3><?php echo $Filas['Medicamentos']; ?></h3>
    <h2><i class="fa fa-comments"></i> Consideraciones</h2>
    <details><summary>Comentarios...</summary>
    <p><?php echo $Filas['Recomendaciones'];  ?>.<br>
    Plan de Tratamiento : 
    <?php echo $Filas['Tratamiento'];  ?>  </p>
    <p>Su Proxima cita es :<?php echo $Filas['Prox_Cita'];  ?> </p>
    </details>
    </div>
    <details>
        <summary><h2>Ver Detalles de Triaje</h2></summary>
        <h2><i class="fa fa-thermometer-half"></i> Temperatura</h2>
        <p><?php echo $Filas['Temperatura']; ?>.</p>
        <h2><i class="fa fa-thermometer-half"></i> Alergias</h2>
        <p><?php echo $Filas['Alergias']; ?>.</p>
        <h2><i class="fa fa-heartbeat"></i> Cirugias </h2>
        <p><?php echo $Filas['Cirugias']; ?>.</p>
        <h2><i class="fa fa-tachometer"></i> Presión Arterial</h2>
        <p><?php echo $Filas['Presion_Art']; ?>.</p>
        <h2><i class="fa fa-lungs"></i> Frecuencia Respiratoria</h2>
        <p><?php echo $Filas['Frecuencia_Resp']; ?>.</p>
        <h2><i class="fa fa-heart"></i> Presión Cardiaca</h2>
        <p><?php echo $Filas['Frec_Cardia']; ?>.</p>
        <h2><i class="fa fa-tint"></i> Saturación</h2>
        <p><?php echo $Filas['Saturacion']; ?>.</p>

       
        <details>
        <summary><h2>Ver Detalles de Examen Fisico  </h2></summary>
        <h2><i class="fa fa-heartbeat"></i> Examen Físico: <?php echo $Filas['Examen_Fisico'] ?> </h2>
        <h2><i class="fa fa-balance-scale"></i> Peso</h2>
        <p><?php echo $Filas['Peso']; ?>.</p>
        <h2><i class="fa fa-arrows-v"></i> Altura</h2>
        <p><?php echo $Filas['Talla']; ?>.</p>
        <h2><i class="fa fa-calculator"></i> IMC</h2>
        <p><?php echo $Filas['Imc_Numeric']; ?>.</p>
        <h2><i class="fa fa-bar-chart"></i> Grado IMC</h2>
        <p><?php echo $Filas['Estado_IMC']; ?>.</p>

     </details>
     </details>
     <?php
    }

}

?>

    <div class="Btones" >
    <button id="btn_CierraModal" >Aceptar</button>

    </div>
    </div>
    </div>


<script>
        function PopupModal(id_moda_cont) {
            var mdl =document.getElementById(id_moda_cont);
            var dmlcont=document.getElementById("Modal_Cont");
            mdl.classList.add('activepopup');
            dmlcont.classList.add('activeModal_Cont');
        }

        var btn_CierraModal=document.getElementById('btn_CierraModal');
        btn_CierraModal.addEventListener('click',function () {
            let modal=document.getElementById('ModalPopup');
            var mdl =document.getElementById('Modal_Cont');
            modal.classList.remove('activepopup');
            mdl.classList.remove('activeModal_Cont');
        })

    </script>
</div>
    <?php
}
?>