<?php 

if(isset($_GET['B_Cita_Pag'])){

$ID_Cita=$_GET['id_cita'];
$Fecha_Cita=$_GET['fecha_cita'];

 $AGG ="";
if (!empty($ID_Cita)) {
    $AGG=" AND Numero_Cita ='$ID_Cita'";
}
if(!empty($Fecha_Cita)){
    $AGG=" AND Fecha_Cita ='$Fecha_Cita'";
}
$sql ="SELECT *  FROM lista_citas 
 WHERE Estado = 'En Cola :Aun Falta Cancelar'".$AGG." LIMIT 1" ;
//Crear un objeto ejecutable para mostrar la tabla 
$ejecutar = $ObjetoConexion->query($sql);
//$ejecutar // es el objeto a usar en el llamado de la pagina
if($ejecutar==false){
$ejecutar ="No se pudo ejecutar error : Consulta ".$sql ;
}

}

?>

