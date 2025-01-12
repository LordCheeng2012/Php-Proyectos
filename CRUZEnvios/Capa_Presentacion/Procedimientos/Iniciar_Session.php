<?php

//recibir los datos del cliente
if(isset($_POST['txtDni']) && isset($_POST['txtContra'])){
	//incluir la  clase datos
include './../../Capa_Datos/Datos.php';
//instancia de la clase datos
$data= new Datos();
$Dni = $_POST['txtDni'];
$Contra = $_POST['txtContra'];
//crear la consulta


$sql = "SELECT COUNT(*) FROM  cuentaslogin WHERE DNI='$Dni'
 AND Contrasena='$Contra'";


//llamar al metodo query del objeto conexion del objetoo $data

 $resultado=$data->conexion->query($sql);
 
 if($resultado !== false){
	
	//si esto no es false
	//entonces la consulta se ejecuto correctamente
	//recorrer el resultado de la consulta
	$Filas=$resultado->fetch_array();
	if($Filas['COUNT(*)']==1){
		
		//obtener los datos de session
		$dataSesion="SELECT *  FROM cuentas WHERE DNI = '$Dni'";
		$resultadoSesion=$data->conexion->query($dataSesion);
		//si hay registros
		
		while ($row=$resultadoSesion->fetch_array()) {
		$Nombres_User=$row['NOMBRES'];
		$Telefono_User=$row['TELEFONO'];
		$Email_User=$row['EMAIL'];
		}
		session_start();
		//crear variables de sessiones
		$_SESSION['user']=$Nombres_User;
		$_SESSION['TELEFONO']=$Telefono_User;
		$_SESSION['EMAIL']=$Email_User;
		///mandar los resultdos al cliente

		$Rdata=[	
			'Color'=>'#155f36',
			'Estado'=>true,
			'Mensaje'=> 'Accedio al sistema',
			'session_Date' => 'se creo y se guardaron datos de session'
		];

		$resultado->free();
		if (isset($resultadoSesion)) {
			$resultadoSesion->free();
		}
	
	}else{
		$Rdata=[
			'Color'=>'#F22233',
			'Estado'=>false,
			'Mensaje'=> 'Usuario no Existe, credenciales incorrectas'
		];
		
	}

	 echo json_encode($Rdata);
 }else{
	$data->conexion->close();
	 echo json_encode( $data->conexion->error);
 }



}else{
	echo json_encode("se procesaron los datos / : pero no se enviaron los datos");
}


?>