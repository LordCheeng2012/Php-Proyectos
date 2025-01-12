<?php 
include './../../controladore/Controladore.php';
    //inlcuir la clase Messenger ,
    if(!require_once __DIR__.'./../../../Capa_Datos/Servidor.php'){
        
        $Respuesta = "no se leyo el archivo clase indetectable";
    }
    $mensenger=new Messenger();
    $Respuesta="Servidor : no se detecto ninguna peticion post";
   //Metodo a utilizar :Usaremos LONG Polling para sondear peticiones Periodicas al servidor
// 1. El cliente envia una solicitud al servidor
// 2. El servidor responde con un tiempo de espera
// 3. El cliente envia una solicitud al servidor cada cierto tiempo
// 4. El servidor responde con un tiempo de espera o con la respuesta esperada
    // 5. El cliente recibe la respuesta y se actualiza la interfaz de usuario
    if(isset($_POST['mensaje']) && isset($_POST['User']) && isset($_POST['id_chat']) ){
      $data=$_POST['mensaje']; 
      $User=$_POST['User'];
      $id=$_POST['id_chat'];
      $mensenger->EnviarMensaje($id,$resulSession,$data);
      $Respuesta= $mensenger->Estado;
       //si no se ah enviado mensaje entonces verifiquemos el mensaje actual
    }

    


    echo json_encode( $Respuesta );



?>
