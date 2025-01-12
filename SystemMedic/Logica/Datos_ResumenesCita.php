<?php

if(isset($_GET['BtnBusca_Cita'])){
$NumeroCita=$_GET['TxtNumero_Cita'];
if (empty($NumeroCita)) {
    $MODALActivate= "<script> alert('Debe ingresar un numero de cita'); </script>";
}else{
include './Logica/ConexionBD.php';
$Consulta="SELECT * FROM 
lista_atencion WHERE Numero_Cita='$NumeroCita'";
$Consulta2="SELECT Fecha_Cita ,Nombre_Doctor,Apellidos_Doctor,Especialidad FROM lista_citas WHERE Numero_Cita='$NumeroCita'";
$Consulta3="SELECT Nombres,Apellidos FROM pacientes WHERE ID_Paciente ='$ID_Paciente'";

$Resultado=mysqli_query($ObjetoConexion,$Consulta);
$Resultado2=mysqli_query($ObjetoConexion,$Consulta2);
$Resultado3=mysqli_query($ObjetoConexion,$Consulta3);
if(($Resultado==false ||  $Resultado->num_rows==0 )
&& ($Resultado2 ==false || $Resultado2->num_rows==0 )&& ($Resultado3==false || $Resultado3->num_rows==0) ){
    echo "Error en la consulta";
    $MODALActivate ="<script>
    alert('Error')
    </script>";
}elseif($Resultado->num_rows==1){
    $MODALActivate="<script>
    PopupModal('ModalPopup')
    </script>";
}else{
    $MODALActivate ="<script>
    alert('No se encontro Cita o esta aun no ah sido Atendida')
    </script>";
}

}


echo $MODALActivate;

}


?>