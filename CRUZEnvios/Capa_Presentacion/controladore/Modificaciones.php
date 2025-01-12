
<?php
    include('../../Capa_Negocio/Negocio.php');
//para retroceder directorios se usa la notacion /.. ->por cada carpeta
//Es llamada a traves de una peticion ajax 
if (isset($_POST['Peticion'])) {    
$Peticion= $_POST["Peticion"]; //Recibir la accion
//Ejecutar la Peticion
ProcesarDatos($Peticion);
}else{
    echo "No existe una Peticion";
}
function ProcesarDatos( $TipodeModificacion){
    //indicar que son variables globales
   global $DNIDesti,$NDestino, $Ncotizacion,$DataNeg;  
if ($TipodeModificacion=='Update') {
    //Editar
    $DNIDesti = trim($_POST["Dni"]); //Dni
    $NDestino=trim($_POST["Destino"]); //Nombre del Nuevo Destino
    $Ncotizacion= trim($_POST["Cotizacion"]); //Nuevo precio
    $ID=$_POST['ID_Orden'];
    EditarRegistro($ID,$DNIDesti,$NDestino,$Ncotizacion);

} elseif($TipodeModificacion=='Delete'){
    //Eliminar    
    $ID=trim($_POST['ID_Orden']);
    EliminarRegistro($ID);
}else {
    return "No es posible acceder a ningun metodo que tenga el parametro de : $TipodeModificacion";
}
}
function EliminarRegistro($ID_Del){
    $DelSql='DELETE FROM lista_orden_servicios 
     WHERE N_ORDEN  = ?';
     $Negocio=new Negocio();
     try {
        $ObjStmt=mysqli_prepare($Negocio->ObjConexion,$DelSql);
        if ($ObjStmt==false) {
            echo json_encode('Al Parecer hay un Error en la Vinculacion de 
            La instancia Negocio'.$ObjStmt->error);
        }
        $Params=mysqli_stmt_bind_param($ObjStmt, 'i',$ID_Del);
        if (!$Params) {
            # code...
            echo json_encode("Error al Vincular los Parametros");
        }      
        $Params=mysqli_stmt_execute($ObjStmt);
        if ($Params==false) {
            echo json_encode('Hubo un error en tu Peticion');
        }
        mysqli_close($Negocio->ObjConexion);
        echo  json_encode('Se ah Anulado el Registro correctamente');
     } catch (\Throwable $th) {
        //throw $th;
        echo json_encode('Ocurrio un Error Inesperado:'.$th->getMessage());
     }

}
function EditarRegistro($ID,$dnidestinatario,$destino,$Ncotizacion){
    //Construir la Consultas
    $Sql="UPDATE  lista_orden_servicios SET DESTINATARIO = ?,
    DESTINO = ?, 
    PRECIO_MINIMO =?
     WHERE N_ORDEN = ? ";
     //Preparar las consultas
        //Usamos el metodo Prepare MYSQLIPREPARE($objCOnexion,$Consulta);
     $Data=new Negocio();

    $Objetostmt=mysqli_prepare($Data->ObjConexion,$Sql)
    or die (  json_encode( 'Hubo un error en la conexion'. 
    mysqli_error($Data->ObjConexion)));
    //Vincular los parametros del usuario usando el metodo
    // mYSQLI_stmt__bind_PARAMS(ObjStmt,'tipoDato',variable)
    //el objeto stmt  lo creamos en MySqli_prepare que devuelve dicho objeto
    $VinculacionPara=mysqli_stmt_bind_param($Objetostmt,'isii',
    $dnidestinatario,$destino,$Ncotizacion,$ID);
    if ($VinculacionPara==false) {
    echo json_encode( 'Error al Vincular Parametros');
    }else{
        $ResultadoExecute=mysqli_stmt_execute($Objetostmt);
    }
    // Ejecutamos el Statement 

if ($ResultadoExecute!= false) {
     //Unir Columnas y los resultados
        //$ResultadoExecute=
        //mysqli_stmt_bind_result($Objetostmt,$CDniDest,$CDestino,$CPrecioMin);
        //Desplegar los resultados
       // while ($ResultadoExecute) {
            //Imprimos los resultados que obtenemos en el metodo result
        //}
            //Cerrar el objeto stmt
         //mysqli_stmt_close( $Objetostmt );
         echo json_encode( "Registro Editado ");
         
}else{
    echo json_encode('Hubo un error en la ejecucion de la consulta'.$Objetostmt->error);
}
}
?>