<?php
//controlar redirecciones de session

 function redirecciones(){
    session_start();
    if(isset($_SESSION['user'])){
        $NombreUsuario=$_SESSION['user'];
        return $NombreUsuario;

    }else{
        return false;
    }
}
$resulSession=redirecciones();
if($resulSession == false){
header("location:Login.html"); 
}


?>
