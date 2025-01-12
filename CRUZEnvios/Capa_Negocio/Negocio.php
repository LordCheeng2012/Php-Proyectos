<?php
// En Datos.php
//en si solo debe ser ../capa_Dat/datos , pero como estamos incluyendo a negocio a varios 
// archivos, es mejor dejarlo de esta manera para evitar problemas de rutas
include  __DIR__.'./../Capa_Datos/Datos.php';
class Negocio{
public $ObjConexion;
public function __construct()  {
    //este constructor no es 
    $Data=new Datos();  
    if ( $Data->conexion->connect_error) {
     die('Ah ocurrido un error en la conexion');
    }
    $this->ObjConexion= $Data->conexion;

}
public function IniciarSession($User,$Contraseña){
    $Datos = new Datos();
    list($res,$valor,$Usuario )= $Datos->IniciarSession($User,$Contraseña);
    return array ($res,$valor,$Usuario);    
}
public function obtenervalor($param){
$datos = new Datos();
$Res = $datos->MostrarValores($param);
return $Res;
}

public function Agencias() {
$Data=new Datos();
$agencias=$Data->Agencias();
if(is_array($agencias)){
    return $agencias;
}else{
     return  "al parecer hubo un error".$agencias;
}
}
public function RegistrarEnvios($DniRemitente,$DniDestinatario,$Categoria,$Precio,$Destino,$fecha_envio,$hora_envio){
  $Data=new Datos();
  $ResultadoRegistro=$Data->RegistrarEnvios($DniRemitente,$DniDestinatario,$Categoria,$Precio,$Destino,$fecha_envio,$hora_envio);
    return $ResultadoRegistro;
}
public function ListarRegistros($Destino,$DniDestinatario,$DniRemitente,$Fecha_Envio,$fechaRecepcion){
$Data=new Datos();
$Resultado=$Data->ListaRegistros($Destino,$DniDestinatario,$DniRemitente,$Fecha_Envio,$fechaRecepcion);
return $Resultado;
}
}

?>