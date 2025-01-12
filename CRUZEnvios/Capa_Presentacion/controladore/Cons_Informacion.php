<?php
//consulta de los clientes para solicitar informacion del backend
//definir las funciones
//Funcion para traer un registro de LODS
$Respuesta="se leyo el archivo pero aun no se leyeron las funciones";
include './Funciones.php';
if(isset($_GET['Consulta'])){
    $Respuesta="Se ah detectado la peticon";
    $Data_ID=$_GET['Consulta']['id_registro'];
    $Data_Tabla=$_GET['Consulta']['TB_From'];
    //ejecutara la funcion ;retornara true o false
        $Respuesta = Query_LOST($Data_ID);
        if($Respuesta==false){
            $Respuesta="No se ha encontrado el registro o hubo un error en el servidor";
        }
}

?>

<?php 
if(isset($_POST['GetName'])){
    $Dni=$_POST['Dni'];
$Respuesta=GetName($Dni);
}

//enviar al cliente
echo json_encode($Respuesta);

?>