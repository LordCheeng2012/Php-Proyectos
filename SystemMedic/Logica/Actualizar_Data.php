

<?php 
$num=0;
//remover citas vencidas este archivo se ejecutara cada ve que el usuario visite historial de citas
// y mandara un mensaje mandando el resultado de la actualizacion
 if(!include('./Logica/ConexionBD.php')){
     echo " no se leyo el archivo";
 }
$Fecha_Actual=date('Y-m-d');

$SQL="SELECT COUNT(*) as total FROM Lista_Citas WHERE Fecha_Cita <='$Fecha_Actual'";
$Resultado=mysqli_query($ObjetoConexion,$SQL);
if($Resultado==false){
echo "error razón".$ObjetoConexion->error;
}

while ($filas=$Resultado->fetch_assoc()) {
      $num=$filas['total'];
      //dentro del bucle si los resultados arrojan no registra 0 , quiere decir que hay registros
      //por ende actualiza las citas vencidas y ponlas como canceladas
      if($Resultado->num_rows!=0){
        $upd="UPDATE Lista_Citas SET Estado = 'Cancelado'
         WHERE  Fecha_Cita <='$Fecha_Actual'";
       
        $Resultado2=mysqli_query($ObjetoConexion,$upd);
        if($Resultado2 != false   ){

        $Mens="se acaban de remover estas citas,porque ya pásaron la fecha establecída.";
        }else{
            $Mens="no se pudo remover las citas por que no se encontraron  las citas. consulta :".$upd;
            
        
        }
      }
}

//obtener todas las citas del paciente que ya se hayan vencido


?>
