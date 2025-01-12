<?php 
//establece todas las funciones que pueda utilizar el sistema


function GetName($dni){
    $resp ="El valor es :".$dni;
    //funcion para obtener datos apartir del dni
    $consulta="SELECT NOMBRES FROM Cuentas WHERE DNI = ? ";
    include __DIR__."./../../Capa_Negocio/Negocio.php";
   $neg=new Negocio();
   $precons=$neg->ObjConexion->prepare($consulta);
   if(!$precons){
    $resp ="no se preparo la consulta: ".$neg->ObjConexion->error;
   }else{
    $resp="se preparo la consulta";
    //vincular y ejecutar
    if(!$precons->bind_param("i",$dni)){
        $resp="no se vincularon los datos";
    }else{
        $resp="se vincularon los datos";
        $precons->bind_param("i",$dni);
    }
    if(!$precons->execute()){
        $resp="no se ejecuto";
    }else{
        $resp="se ejecuto";
        $precons->execute();
        //obtener los datos
        $res=$precons->get_result();
        $data=$res->fetch_assoc();
        $resp=$data['NOMBRES'];
    }
    
   }

return $resp;
}
function Query_LOST($N_Order){
    //se ah definido el parametro n orden para el id de registro
    
    $consulta="SELECT * FROM lista_orden_servicios
    WHERE N_ORDEN='$N_Order'";
    //incluir la clase negocio
    include __DIR__."./../../Capa_Negocio/Negocio.php";
    $negocio=New Negocio();
    $query=$negocio->ObjConexion->query($consulta);
    if ($query !=false){
    while ($filas=$query->fetch_assoc()) {
        $Destinatario=$filas['DESTINATARIO'];
        $Precio_Envio=$filas['PRECIO_MINIMO'];
        //como solo son registros unicos guardamos en un array
        $Array_Info=array ($Destinatario,$Precio_Envio);  
    }
    
    return $Array_Info;
    
    }else{
        return false;
    }
    }
    


?>