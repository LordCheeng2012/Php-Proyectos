<?php 
if(isset($_POST['UpdateCuenta'])){
include './Sessiones.php';
include './ConexionBD.php';
$User=$_POST['User'];
$Pass=$_POST['Contraseña'];

$update="UPDATE Cuentas_Pacientes
SET Usuario='$User',
Contrasena='$Pass'
WHERE ID_Paciente='$ID_Paciente'";
$Res=$ObjetoConexion->query($update);
if($Res==false){
header("Location:../Login.php?Msg=Error al actualizar la cuenta ERROR : ".mysqli_error($ObjetoConexion));


}else{
if($ObjetoConexion->affected_rows==0){
    header("Location:../Login.php?Msg=Error no se actualizo ninguna cuenta");
}
    header('Location:../Home.php?Msg=Se actualizo la cuenta');

}

}

?>