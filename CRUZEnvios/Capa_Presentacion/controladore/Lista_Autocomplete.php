<?php
include  __DIR__.'./../../Capa_Negocio/Negocio.php'; 
if(!isset($_POST['Dni_Sugerencia'])){
$result="no existe la solicitud , respuesta del servidor sin exito";
//si no hay form 
 }else{ 
   //ejecuta la sugerencia
$VALOR =$_POST['Dni_Sugerencia'];
//obtiene el valor
$result="se leyo el valor";
$Nego=new Negocio();
//instancia la clase
$result="se instancio la clase";
$conexion=$Nego->ObjConexion;
//obtener ob conexion

$sql = "SELECT DNI , Nombres FROM Cuentas WHERE DNI LIKE '%$VALOR%'";
//MUY IMPORTANTE : cuando concatenamos con like debemos agregar los comodines segun 
//logica , pero siempre debe ir dentro de '%valor%' no fuera de ellas 
 $RES=$conexion->query($sql);
 //llamar al metodo query
 if($RES!=false){
   //si el metodo no retorna false o booleano
   //Tipos de acumulador en bucles
   //usar .= para concatenar strings
   //usar += para sumar un valor existente a acumular
  while ($filas=$RES->fetch_assoc()) {
   $result .= "
   <option  value='".$filas['DNI']."'>".$filas['Nombres']."</option>
        <option value='".$filas['DNI']."'>".$filas['Nombres']."</option>
        <option value='".$filas['DNI']."'>".$filas['Nombres']."</option>
        <option value='".$filas['DNI']."'>".$filas['Nombres']."</option>   
   ";   
 }
 //sale de bucle
 }else{
   //respusta en caso de error
   $result="no se pudo realizar la consulta ".$Nego->ObjConexion->error;
 }
//mandar la respuesta
 }
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>

