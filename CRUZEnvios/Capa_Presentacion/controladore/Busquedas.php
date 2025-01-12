<?php 
include __DIR__.'./../../Capa_Negocio/Negocio.php';
$ObjNegocio=new Negocio();
$obconx=$ObjNegocio->ObjConexion;
$Salida="";
$consulta="SELECT 'Ingrese Dni 'AS  DNI,'
 Ingrese Nombres o DNI' AS NOMBRES ";
//verificar si existe el parametro 
if(isset($_POST['Dni'])){
	//limpiar caracteres
$Q=$obconx->real_escape_string($_POST['Dni']);
$consulta="SELECT DNI,NOMBRES FROM cuentas 
WHERE DNI LIKE '%".$Q."%' OR NOMBRES LIKE '%".$Q."%'";
}

$Resultado=$obconx->query($consulta);
//comprobar resultados
if($Resultado->num_rows > 0){
	//crear una tabla 
	$Salida="<table class='table table-sm'>
	<thead>
		<td> </td>
	</thead>
<tbody>";
$NombreResult="";
//funciona hay filas obtener resultados 
	while ($Filas=$Resultado->fetch_assoc()) {
	
		//añadir valores
		$Salida.="<tr>
		<td> <button id='Dnis' data-nombre='"
		.$Filas['NOMBRES']."' value='"
		.$Filas['DNI'].
		"' onclick='SeleccionaDni(this.value,this.dataset.nombre)' class='Lista' type='button' >".$Filas['DNI']." : ".$Filas['NOMBRES']." </button></td>
		</tr>";
		$NombreResult=$Filas['NOMBRES'];
	}
	//VERIFICAMOS SI DESEA EL NOMBRE O EL DNI
		if (isset($_POST['Dni']) && isset($_POST['NombreDni'])) {
			$Nombre=$NombreResult;
			echo json_encode($Nombre);
		}else{
	$Salida.="</tbody></table>";
	echo $Salida;
		}
}else{
echo "Nombre o DNI Desconocidos";
//como es desconocido debemos nular el input o obligar a encontrar
//un usuario existente

}

if(isset($_POST['Dni_Consulta'])){
$Resp="se leyo la peticion dni consulta";
echo json_encode($Resp);
}

?>
