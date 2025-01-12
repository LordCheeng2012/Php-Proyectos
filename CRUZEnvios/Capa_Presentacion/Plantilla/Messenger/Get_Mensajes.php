<?php 
  if(!require_once __DIR__.'./../../../Capa_Datos/Servidor.php'){
        
    $Respuesta = "no se leyo el archivo clase indetectable";
}
$Respuesta ="no se detecto el resultado de la peticion...";
$mensenger=new Messenger();
//Verificar si hay mensajes
$GetMensaje=$mensenger->RecibirMensaje();
if($GetMensaje==false){
    $Respuesta="no se recibio ningun mensaje aun";
}else{
$Respuesta=$GetMensaje;
echo json_encode($Respuesta);
}
?>