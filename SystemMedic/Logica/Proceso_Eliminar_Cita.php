<?php 
if(isset($_GET['DeleteCITA'])){

    include './ConexionBD.php';
$Num_Cita=$_GET['txtNumCita'];
$SQL ="DELETE FROM Lista_Citas WHERE Estado='En Cola :Aun Falta Cancelar' 
And Numero_Cita='$Num_Cita'";
$result = $ObjetoConexion->query($SQL);
header('Location:../Home.php?Msg=se ah eliminado la cita');


}


?>