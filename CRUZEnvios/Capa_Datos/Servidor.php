<?php 

//crear la clase mesenger 
class Messenger {
     public $mensaje=false;
     public $Estado="Se ah Creado un objeto con esta Clase,  Estado : Sin Iniciar";
     public $Respuesta="Se ah Creado un objeto con esta Clase,  Estado : Sin Iniciar";

public function EnviarMensaje($ID_CHAT,$USUARIO_EMISOR,$mensaje):bool{
    include_once __DIR__.'./Datos.php';
    $data=new Datos();
        if( empty($mensaje) || $mensaje== false ){
            $this->mensaje=false;
            return false;

        }else{
            $this->Respuesta= "enviando mensaje ";
            //logica para enviar el mensaje al servidor y agregar a la bd
            //Importante : se utilizara la tecnica de consultas y acciones preparadas
            $sql="INSERT INTO `idchat:$ID_CHAT`(
            `USERNAME`,
            `Mensaje`)
             VALUES
             ( '$USUARIO_EMISOR',
                '$mensaje'
                )";

            $SendMsg=$data->conexion->query($sql);
                if(!$SendMsg){
                    $this->Estado="Su ultima Consulta al metodo
                     EnviarMensaje ah fallado Razon : ". $data->conexion->error;
                    return false;
                }
                $data->conexion->close();
            $this->Estado="se ah enviado y 
            registrado el mensaje correctamente".$mensaje;
            return true;
        }

}
public function RecibirMensaje()  {
    if($this->mensaje!=false){
        $this->Respuesta= $this->mensaje;
           //manejar la logica para recibir mensaje de la bd 






            return "Mensaje Recibido  :".$this->mensaje;
    }
    return false;
}

public function ReturnChatsUser($SessionUser):array|string{
//la funcion ReturnChatsUser retornara un array clave valor donded retornara 
//los siguientes valores :
// 1. Nombre del usuario 
// 2. Mensajes Recibidos del usuario
// 3.foto de perfil , (aun por analisar el formato de imagen a retornar)
include_once __DIR__.'./Datos.php';
$data = new Datos();
//en la bd verificar la existencia de tablas como chat , donde el nombre de tabla 
//tendra como estructura : Chat:Nombre_User(usaurio logueado)-UsuarioReceptor(Usuario logueado)
//se preguntara si existe en la bd una tabla que tenga el nombre de usaurio logueado
//si existe se retornara el nombre del usuario y los mensajes recividos
//de igual manera si uno de esas columnas existen entonces retornar el chat 
//este es una logica simple , para mas complejo se nesesita de una bd no sql como mongo db que es
//una base de datos no relacional
$sql="SELECT * FROM `chat:$SessionUser` WHERE 1";
$result = $data->conexion->query($sql);
 if($result==false){
    //en caso de que no encuentra la tabla , quiere decir que no existen conversasiones aun 
    return "Inicia tu Primera Conversación :)";
}else{
   
    $Chats=array();
    while ($filas=$result->fetch_assoc()) {
        //entonces vamos a obtener todos esos datos previsibles para poder 
        //mostrar en la interfaz
        $ID_CHAT=$filas['ID_CHAT'];
        $USUARIO=$filas['USUARIO'];
        $Mensaje=$filas['ult_Mensaje'];
       
    //LLENAR EL ARRAY
        $Chats[]=[
            'ID_CHAT'=>$ID_CHAT,
            'USUARIO'=>$USUARIO,
            'Mensaje'=>$Mensaje,
           
        ];

    }
    //retornar el array
    return $Chats;
    }
}

public function LoadChat_User($SessionUser,$ID_CHAT):string{
    //retorna en codigo html toda la informacion del chat seleccionado
    //se nesesita el id del chat
    //1: incluir a datos
    include_once __DIR__.'./Datos.php';
    $data=new Datos();
    //2: verificar si existe el chat
    $sql="SELECT * FROM `idchat:$ID_CHAT`";
    $Chat=$data->conexion->query($sql);
    
    if($Chat!=false){
        $HTML="";
       while ($filas=$Chat->fetch_assoc()) {
            //estas variables definen si el mensaje es recibido o enviado en los css
           $User=$filas['USERNAME'];
           $Mensaje=$filas['Mensaje'];
           if($User!=$SessionUser){
            //entonces es receptor
            $HTML.="<div class='Chat-Interaction'>
            <div class='User_Receptor'>
               ".$Mensaje."
            </div>
        </div>";

           }elseif($User==$SessionUser){
            //entonces es el emisor
            $HTML.="<div class='Chat-Interaction'>
            <div class='User_Session'>
               ".$Mensaje."
            </div>
        </div>";
           }else{
            //si no existe el usuario
           $HTML="<script>
           console.log('error al detectar al usuario')</script>";
            
           }

       } 
    }else{
       
        $HTML="<p class='P_MES' p>Dale un Saludo a tu nueva amístad , empecémos bien <p/>";
        $data->conexion->close();
    }
    return $HTML;

}

}



//prueba la clase----
 //$messenger=new Messenger();   
 //echo $messenger->Respuesta."<br>";
 //$res =$messenger->EnviarMensaje( "Hola Mi servidor :)");
   //if($res==true){
     //  echo $messenger->Respuesta."<br>";
      //echo "dio true";
       //$msg= $messenger->RecibirMensaje();
        //echo $msg;
   //}


?>
