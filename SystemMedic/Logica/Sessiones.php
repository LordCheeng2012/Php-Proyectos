<?php
	session_start();
	
	///El metodo Session_Start() se usar para iniciar sessiones en aplicaciones web 
	//Almacenar datos en todo el ambito de la app web
	//Se usa llamando la clave del valor de una session
	if(isset($_SESSION['ID_Paciente'])){
		$ID_Paciente=$_SESSION['ID_Paciente'];
		//EN lOGIN ID_Paciente se crea esta session para poder usarla en toda la app
		//si no existe , debe iniciar session
	//Obtenemos la variable Session
	include 'ConexionBD.php';
	//Ademas obtenemos sus datos personales : 
	//por si el sistema nesesita realizar factura o comprobante de pago
		$DATA_Per="SELECT * FROM 
		pacientes WHERE ID_Paciente='$ID_Paciente'";
		$Res_Data=mysqli_query($ObjetoConexion,$DATA_Per);
		if($Res_Data!=false){
			$Fila_Data=mysqli_fetch_array($Res_Data);
			//Obtenemos los datos del paciente
			$Nombre_Paciente=$Fila_Data['Nombres'];
			$Apellido_Paciente=$Fila_Data['Apellidos'];
			$Edad_Paciente=$Fila_Data['Edad'];
			$Sexo_Paciente=$Fila_Data['Sexo'];
	
		}else{
			//Si no existe usuario redirigir a login
			echo "<script>console.log('advertencia los datos personales del usuario no se cargaron');</script>";
		}
	}else{
		
		//Si no existe usuario redirigir a login
		header('location:./Login.php');
	}
	?>
