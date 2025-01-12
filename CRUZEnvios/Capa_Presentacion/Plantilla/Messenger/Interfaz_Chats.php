<?php
//incluir controladores y verificr existencia de usuario
include './../../../Capa_Negocio/Negocio.php';
include './../../../Capa_Datos/Servidor.php';
include './../../controladore/Controladore.php';
$Negocio=new Negocio();
$Servidor=new Messenger();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!--Iconos Boostrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
 <link rel="stylesheet" href="./../../Estilos/Ultimate2012UICSS/Fonts_Ui_System.css">
 <link rel="stylesheet" href="./../../Estilos/Mensajeria_chats.css">
 <link rel="stylesheet" href="./../../Estilos/Loaded.css">
</head>
<body class="body" >
<header class="header" >
    <div class="Notificaciones" >
    <h1 class="tituloMensaje" >Mensajeria - User : <?php echo $resulSession  ?> </h1>
        <div class="resumen" >
            <ul>
                <li><i class="bi bi-chat-left"></i> Chats</li>
                <li><i class="bi bi-list-nested"></i> Opciones</li>
                <li><i class="bi bi-arrow-left"></i><a href="./../../index.php">Regresar</a></li>
            </ul>
        </div>
    </div>
   
 <div class="foto_perfil" >
 <img  src="./../../Estilos/Img/linkin-park-lost.jpg" alt="">
 </div>
</header>


<main>
<!--
bucle en php para inprimir el numero de chats 
y todas sus conversasiones
-->
<?php
//Llamar al objeto
$CHATSLIST=$Servidor->ReturnChatsUser($resulSession);
?>

<div class="Content_Chats" >
<div class="Chats_Lista  Content_Chats_item " >
   <div class="List_Chat-title" >
   <h1>LISTA DE CHATS DE : <?PHP echo $resulSession ?></h1>
   </div>
<?php 
if(is_string($CHATSLIST)){
echo $CHATSLIST;
}else{
        foreach ($CHATSLIST as $CHAT) { 
    ?>
 
<div class="Chat_Item" 
 onclick="Chat_Info('<?php echo $CHAT['ID_CHAT'] ?>')" >
      <img src="./../../Estilos/Img/linkin-park-lost.jpg" alt="">
    <div class="Content_Chat" >
        <h2 class="nombre" ><?php echo $CHAT['USUARIO']  ?></h2>
        <p>Mensaje :   <?php echo $CHAT['Mensaje']  ?></p>
    </div>
</div>
<?php
     }
}

?>  
</div>
<div class="Chat Content_Chats_item " >
    <div  class="Sala_historial_msg" >
<!--
            se despliega toda la informacion del chats
        -->
    <div class="info_user_chat" id="Div_info_Chat">
        <div class="img_user">
            <input id="txtId_chat" type="hidden" value="">
        <img src="./../../Estilos/Img/linkin-park-lost.jpg" alt="">
        </div>
    <div class="info_user" >
    <h1>USER:CHAT</h1>
    <h2>ESTADO:CONECTED</h2>
    </div>
    </div>
   
    <div id="divcont" class="Chat-History" >
    <!-- bucle para traer toda la informamción del chat seleccionado
        dicho operacion sera gestionada traida por js
    -->
    </div>
    
    </div>
    <div class="Input_msg_opciones" >
       
        <input type="text" placeholder="Escribe tu Mensaje" name="txtMsg" id="txtMsg">
        <button onclick="send_message('<?php echo $resulSession ?>'
        ,'txtMsg','Chat-Interaction','divcont')" 
        type="button"  id="btnSendMsg" ><i class="bi bi-arrow-left"></i></button>
        
    </div>
</div>
</div>
</main>

<script src="./../../JS/Messenger/Messenger.js" >
</script>

</body>
</html>