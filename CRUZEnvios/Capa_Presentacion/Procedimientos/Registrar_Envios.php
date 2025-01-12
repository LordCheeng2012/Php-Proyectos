<?php

include('../controladore/Controladore.php');
//controlar redirecciones de session
//recuerda que las tablas en html son asi 
// Thead son para los emcabesados titulos de las tablas 
//tr son las filas ___ ___  ; td son las columnas || |
//estas deben estar dentro de la etiqueta tbody o thead  
// Controlar redirecciones de sesión
// Traer nombre de usuario:
require './../../Capa_Negocio/Negocio.php';
$neg=new Negocio();
//Recuperar los datos
if (isset($_POST['Registrar'])) {
    echo  isset($_POST['Destino'] , $_POST['DniDesti'],$_POST['Contenido'],$_POST['Precio'],$_POST['fecha_envio'],
    $_POST['hora_envio']) ? "true" : "falso";

    if(isset($_POST['Destino'] , $_POST['DniDesti'],$_POST['Contenido'],$_POST['Precio'],$_POST['fecha_envio'],
    $_POST['hora_envio'])){
        echo "Datos recuperados correctamente.<br>";
# code...
$destino = $_POST["Destino"];
$dnidestinatario= $_POST["DniDesti"];
$Contenido=$_POST['Contenido'];
$PRECIO_CATEGORIA=$_POST['Precio'];
$Fecha_Envio=$_POST["fecha_envio"];
$hora_envio=$_POST["hora_envio"];
$NOMBRE =$_SESSION['user'];
//extraer el dni 
$sql ="SELECT DNI FROM cuentas WHERE NOMBRES='".$_SESSION['user']."'";


$resultado = $neg->ObjConexion->query($sql) ;
while ($fila=$resultado->fetch_assoc()) {
    $dniemisor = $fila['DNI'];
}

//comprobamos  si hay un mensaje de error o mismo emisor  y destinatario
if ($dniemisor==$dnidestinatario) {
    $resultado= "No puedes enviarte un mensaje a ti mismo";
    header("location:../PruebasUnitarias.php?Mensaje=.$resultado");
    exit();
}else{
//llamar la funcion

$ResFuncicon=$neg->RegistrarEnvios($dniemisor,$dnidestinatario,$Contenido,$PRECIO_CATEGORIA,$destino,$Fecha_Envio,$hora_envio); 

    /*Si se ejecuto la funcion mostrar el resultado*/
header("location:../index.php?Mensaje=". urlencode($ResFuncicon));
exit();
 
    } 
}
}else {
    echo "Error: no se procesaron los datos.<br>";
    header("location:../PruebasUnitarias.php?Mensaje=error no se procesaron los datos");
    exit();

}

?>