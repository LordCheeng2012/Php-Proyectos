<?php 
if(isset($_GET['Busca_ReprogramarCita'])){
$Numero_Cita=$_GET['ID_Cita'];

if($Numero_Cita==""){
    header("Location:../Reprogramar_Cita.php?Result='alertify'&Modal_Mensaje='No se Encotro cita'&Modal_Detalle='Debe ingresar un Numero de Cita'&Tipo='error'&Numero_Cita='$Numero_Cita'&ID_Doctor='null'");
}else{
if( include('./ConexionBD.php'))
{
    echo "<br>";
    $sql="SELECT Fecha_Cita,ID_Doctor FROM lista_citas 
    WHERE Numero_Cita='$Numero_Cita'";
$result=mysqli_query($ObjetoConexion,$sql);
if($result==false){
echo "error en la consulta".mysqli_error($ObjetoConexion);
}
$row=$result->fetch_assoc();
$Fecha_Cita=$row['Fecha_Cita'];
$Fecha_Actual=date('Y-m-d');
//si la cita es menor a la fecha actual
if($Fecha_Cita <= $Fecha_Actual && $result->num_rows==1 ){
    //echo "true";
    //echo $Fecha_Cita ."<br>";
    //echo $Fecha_Actual."<br>";
   header("Location:../Reprogramar_Cita.php?Result='alertify'&Modal_Mensaje='Cita Encontrada'&Modal_Detalle='La cita se ah vencido,se reprogramara la cita'&Tipo='success'&Numero_Cita='$Numero_Cita'&ID_Doctor='$row[ID_Doctor]'");
}else{
   // echo "false";
    //echo $Fecha_Cita ."<br>";
    //echo $Fecha_Actual."<br>";
    header("Location:../Reprogramar_Cita.php?Result='alertify'&Modal_Mensaje='Se encontro Cita'&Modal_Detalle='La cita aun no se ah vencido o no existe '&Tipo='warning'&Numero_Cita='$Numero_Cita'&ID_Doctor='$row[ID_Doctor]'");

}
}
else{
    $Fecha_Cita="Error no se detecto archivo";
header("Location:../Reprogramar_Cita.php?Res=Modal_AlertShow&Modal_Mensaje=Se encontro Cita&Modal_Detalle='$Fecha_Cita'");
}

}
    
}















?>