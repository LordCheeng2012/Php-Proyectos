

<?php 
//Archivo para cargar toda la conversacion de un chat segun su id, del usuario logueado
//Se debe de llamar a la funcion con el id del chat que se quiere cargar
//1: Primero llamar a la clase Messenger(incluirla previamente)
require_once './../../../Capa_Datos/Servidor.php';
require_once './../../controladore/Controladore.php';
//instanciar la clase
$mensenger=new Messenger();
//probar
//echo $mensenger->Estado;

//verificar el envio del dato del servidor
if(isset($_POST['ID_CHAT'])){
    //llamar a la funcion para cargar la conversacion
    $ID_CHAT=$_POST['ID_CHAT'];
  //llamar a la clase
  $ChatInfo=$mensenger->LoadChat_User($resulSession,$ID_CHAT);  
    echo json_encode($ChatInfo);
    
}else{
    echo "Error al cargar la conversacion";
}
?>