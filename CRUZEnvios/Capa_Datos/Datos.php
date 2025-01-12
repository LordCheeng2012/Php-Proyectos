<?php
//en php $this es como un . de un objeto instanciado en c# para apuntar a un metodo es ->
class Datos {
//crear la conexion 
public $conexion;
//el objeto conexion siempre va tener la cadena conexion y la conexin a bd 
public function __construct(){
$this->conexion= new mysqli('localhost','root','','CruzEnvios');
if($this->conexion->connect_error){
die("error en la conexion al parecer no se proporcionaron bien las credenciales".
$this->conexion->connect_error);
}
}

public function IniciarSession($Dni,$Contraseña){

    try {
        $consulta = "SELECT COUNT(*) as Cantidad FROM 
        cuentaslogin WHERE DNI ='$Dni' And 
    Contrasena='$Contraseña'"; //lo que devuelve esta consulta es el numero de filas afectadas
    //ejecutar consulta
    $resultado=$this->conexion->query($consulta);
    if(!$resultado){
        $ErrorMsj="error en la consulta".$this->conexion->error;
        return array($ErrorMsj,4,"usuario desconocido");
    }else{
        $filas=$resultado->fetch_assoc();
        $Valor=$filas['Cantidad'];
        if($Valor==1){
           
            //CREAR la variable session
            $sql="SELECT Nombres FROM  cuentas WHERE DNI=$Dni";
            $ejeUser=$this->conexion->query($sql);
            $rows=$ejeUser->fetch_assoc();
            $usuario=$rows['Nombres'];


            return array ("Usuario y Contraseña Correctos",$Valor,$usuario); //lo mas probable es que arroje 1
            
        }else{
    
            return array("Usuario y Contraseña Incorrectos",$Valor,"Usuario no esta logueado");
        }
    
    }
    } catch (\Throwable $th) {
        $errormensaje= "error en metodo : ".$th->getMessage()." <br> Codigo Sql :".$this->conexion->error;
        return array ($errormensaje, 0,"hubo un error");
    }
    
    }

public function MostrarValores($Param){
if(is_null($Param)){
return "debe especificar un valor ";
}else{
try {
$sql = "CALL ListarValores($Param);";    
$resul=$this->conexion->query($sql);
 if(!$resul){
    $errormsg="error en conexion"+$this->conexion->error;
    return $errormsg;
 }else{
$filas=$resul->fetch_assoc();
$cantidad=$filas['COUNT(*)'];
return $cantidad;

 }

} catch (\Throwable $th) {
    $errormensaje= "error en metodo".$th->getMessage();
    return $errormensaje;
}

}
}

//METODO PARA TRAER AGENCIAS
public function Agencias(){
    //traer la conexion
    $instruccion= "SELECT * FROM AGENCIAS";
    //ejecutar consulta 
    try {
        $ejec=$this->conexion->query($instruccion);
    if(!$ejec){
             //si falla la consulta , verificando la conexion ;
        return 
        $filas[]=array('Destino'=>"Consulta erronea: " .$this->conexion->error);
    }else{
        //crear un array 
            while($datos=$ejec->fetch_assoc()){
                $id=$datos["ID_DESTINO"];
            $departamento=$datos["DEPARTAMENTO"];
            $distrito=$datos["DISTRITO"];
            $provincia=$datos["PROVINCIA"];
            $Destino=$datos["DESTINO"];
            //retornar un array para poder imprimirlo en una tabla 
                $filas[]=[
                'id'=>$id,
                'departamento'=>$departamento,
                'distrito'=>$distrito,
                'provincia'=>$provincia,
                'Destino'=>$Destino
                ];
            }

        //retornar como un array bidimensional
return $filas;
}
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
   
}

public function RegistrarEnvios($DniRemitente,$DniDestinatario,
$Categoria,$Precio,$Destino,$Fecha_Envio,$Hora_Envio){
 if(isset($DniRemitente,$DniDestinatario,$Destino,$Categoria,
 $Precio,$Fecha_Envio,$Hora_Envio) ){     
        //preparar la instruccion a ejecutarse
        $InstruccionSql="INSERT INTO 
lista_orden_servicios (N_ORDEN,ESTADO,DNI,DESTINATARIO,
CATEGORIA,PRECIO_MINIMO,DESTINO,Fecha_Envio,Hora_Envio,
Fecha_Entrega,Hora_Entrega) VALUES 
(NULL,'NO DISPONIBLE','$DniRemitente','$DniDestinatario','$Categoria','$Precio','$Destino','$Fecha_Envio','$Hora_Envio','0000-00-00','0000-00-00')
";
    try {
        //obtener el resultado de la consulta
        $resSql=$this->conexion->query($InstruccionSql);
        if(!$resSql){
            $error=$this->conexion->error;
            //el numero que retorna errno es el codigo de error de sql
            //cuandp se trata de violacion de clave externa es 1452 
            //indicando que es un valor desconocidos
            if ($this->conexion->errno==1452) {
                $ResumenError= 'El Destinatario no existe ,
                 solo se envian a usuarios existentes <br>
                 CODIGO DE ERROR : 1452';
                 return $ResumenError;
            }
           $ResumenError = "Error al Registrar el envio : ".$error." 
           Instruccion : ".$InstruccionSql.'CODIGO DE ERROR : '.$this->conexion->errno;
            return $ResumenError;
        }else{
            // echo "Registro Exitoso!";
         return "Se ah Registrado el Envio Correctamente";
        }
    } catch (\Throwable $th) {
        //sabemoms que el codigo 1452 indica que sql arrojo un error referencial
        //a claves externas es  decir el dni no figura en la tabla de usuarios
       
    return "ocurrio un error Numero de exepcion :". $th->getMessage();
    }
        }else {
            
            return "No se enviaron todos los parametros requeridos
            $DniRemitente,$DniDestinatario,$Destino,$Categoria,$Precio,$Fecha_Envio,$Hora_Envio    
            .";
        } 
}

//cuantos parametros nesesita para ser llamado el sp 
public function ListaRegistros($Destino="",$DniDestinatario="",$DniRemitente="",$Fecha_Envio="",$fechaRecepcion="") {
    $Listar="SELECT `N_ORDEN`, `ESTADO`, `DNI`, `DESTINATARIO`, `CATEGORIA`, 
    `PRECIO_MINIMO`, `DESTINO`, `Fecha_Envio`,
     `Hora_Envio`, `Fecha_Entrega`, `Hora_Entrega`
      FROM `lista_orden_servicios` WHERE 1=1";
   if (!empty($Destino)) {
    $Listar.=" AND Destino LIKE '$Destino' ";
   } 
   if (!empty($DniDestinatario)) {
    $Listar.=" AND DESTINATARIO LIKE '$DniDestinatario' ";
   } 
   if (!empty($DniRemitente)) {
    $Listar.=" AND DNI LIKE '$DniRemitente' ";
   } 
   if (!empty($Fecha_Envio)) {
    $Listar.=" AND Fecha_Envio <= '$Fecha_Envio' ";
   } 
   if (!empty($fechaRecepcion) ) {
    $Listar.=" AND Fecha_Entrega >= '$fechaRecepcion' ";
   } 
//ejecutar la consulta 
   $ConsultaOrdenesServicio = mysqli_query($this->conexion, $Listar);
   $NumElementos=mysqli_num_rows($ConsultaOrdenesServicio);
   $Resultado=array();
   if($NumElementos!==0){
    //DEBEMOS DEVOLVER UN ARRAY COMO EL METODO CONOCIDO 
   while ($Filas=mysqli_fetch_array($ConsultaOrdenesServicio)) {
    // no se puedo asignar cada variable dentro del bucle directamente , ya que siempre contendra el ultimo valor , por ende se 
    //se debe almacenar en un array ademas , se recomienda que dentro del bucle utilisar asignacion de => para evitar problemas
    $Resultado[]=array(
        'N_ORDEN'=>$Filas["N_ORDEN"],
        'Estado'=>$Filas["ESTADO"],
        'Remitente'=>$Filas["DNI"],
        'DESTINATARIO'=>$Filas["DESTINATARIO"],
        'DESTINO'=>$Filas["DESTINO"],
        'CATEGORIA'=>$Filas["CATEGORIA"],
        'PRECIO'=>$Filas["PRECIO_MINIMO"],
        'FECHAENVIO'=>$Filas["Fecha_Envio"],
        'hora_envio'=>$Filas["Hora_Envio"],
        'Fecha_entrega'=>$Filas["Fecha_Entrega"],
        'hora_entrega'=>$Filas["Hora_Entrega"]
    );

   }
   //retorna el array
        return $Resultado;  
}else{
    if ($ConsultaOrdenesServicio==false) {
        # code...
        $error=mysqli_error($this->conexion);
    //retorna string
     return "No se pudo realizar la conexión a la base de datos o hubo un error en : $error ";
    }
    return "No se Encontraron Resultados";
   }
}

function TransaldoEnvio($ID,$dnidestinatario,$Ncotizacion,$Destino,$AdmUser,$FechaEnvio)  {

    $Instruccion= "UPDATE `lista_orden_servicios`
     SET 'DESTINATARIO = '$dnidestinatario',
     PRECIO_MINIMO = '$Ncotizacion',
     DESTINO = '$Destino',
     Fecha_Envio = '$FechaEnvio',
     DNI = '$AdmUser'
     WHERE  N_ORDEN='$ID';";
    try {
        $Consulta=$this->conexion->execute_query(addslashes($Instruccion));
        if ($Consulta->fetch_array()) {
            # code...
        }      
    } catch (\Throwable $th) {
        //throw $th;
    }

    return false;
}

}

?>