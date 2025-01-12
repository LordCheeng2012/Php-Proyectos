


<?php

//logica para implementar la validacion
//Antes de implementar la validacion -- verificamos si se ah realizado un envio de formulario
//Asi que con el atributo name del boton podremos saber si se mando o no el form
//dentro del if el metodo isset()-- sirve para verificar la existencia de un objeto o peticion
//si esto existe retorna true , si no false 

// Variable para almacenar mensajes
$mensaje = '';

if ( isset($_POST['Login'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    // Simple validación de datos
    if (!empty($usuario) && !empty($password)) {
        // Aquí deberías conectar a la base de datos y realizar la verificación
        // Por ahora, solo simulamos un mensaje de éxito
		include './Logica/ConexionBD.php';
		$consultasql="SELECT count(*) as Rst , ID_Paciente FROM Cuentas_Pacientes
		WHERE Usuario='$usuario'
		 AND Contrasena='$password'";
	   //ahora ejecutamos la consulta recuerda que nesesitamos el objeto conexion
	   //segun el script llamado se llama $ObjetoConexion -entonces
	   $Resultado=mysqli_query($ObjetoConexion,$consultasql);
	   if ($Resultado==false) {
		   # verificamos el metodo si retorna true o false
		   echo "Error en la consulta".$ObjetoConexion->error;
	   
	   }else{
		 //si el metodo retorno otro valor fuera de false entonces se ejecuto correctamente
    //entoonces seguimos con el proceso

    //El metodo mysqli_query retorna 2 valores en caso de exito 
    //retorna un objeto mysqli_Result que es que
    // iteraremos en un bucle para verificar si hay datos
    $Confirmacion='';//variable externa de validacion
    while($filas=$Resultado->fetch_assoc()){
            //dentro del while asignamos la variable fila, siempre y cuando
            //esta variable se le asigne un valor que no sea null o false , 
            //va expresarse como:
            //verdadero por ende se extraen los datos , porque cuando el metodo fetch_assoc()
            //termina de leer los registro de la consulta , retorna null y alli es donde la 
            //variable fila se convierte en false y el bucle termina
            $valor=$filas['Rst']; //accedemos al campo creado Rst
			$ID_Paciente=$filas['ID_Paciente'];

            if ($valor==1) {
                # si valor extraido de filas obtiene un registro existente entonces existe el registro
                //y puede acceder al sistema  y confirmacion es true
                $Confirmacion=true;
            }else{
                $Confirmacion=false;
            }
    }
        //verficamos el valor extraido del bucle
        if ($Confirmacion==true) {
			$Msg=$usuario;
			//Iniciamos session
			session_start();
			/*Almacenar el id del paciente como usuario del sistema*/
			$_SESSION['ID_Paciente']=$ID_Paciente;

            $Respuesta= ' <br>
            <label style="color:green">  Se accedio al sistema , los datos Existen </label>' ;
            header("location:./Home.php?User=$Msg&ID_Pac=$ID_Paciente"); //redireccionamos a la pagina Home.php


        }else{
            $Respuesta= '<br > <label  style="color:red" >
            No se accedio al sistema , los datos no Existen
            </label> ';
        }
	   }

        $mensaje = "Datos recibidos. Usuario: $usuario, Contraseña: $password";
    } else {
        $mensaje = "Por favor, complete todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Session</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="./UL2012.html"><h2> HMS | Patient Login</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login"  method="POST">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
							
							
                            Please enter your name and password to log in.<br />
							<label style="color:red">
							<?php
                            if (isset($_POST['Login'])) {
                                echo						
								$mensaje;
                            }else{
								echo "no hay datos enviados";
							}
							?>
						</label>
                           
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="usuario" required autocomplete="username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" 
                                    name="password" required autocomplete="current-password">
									<i class="fa fa-lock"></i>
									 </span><a href="forgot-password.php">
									Forgot Password ?
								</a>
							</div>
							<div class="form-actions">
								
        
								<button  type="submit"  class="btn btn-primary pull-right"
                                 name="Login">
									Ingresar <i class="fa fa-arrow-circle-right"></i>
								</button>

							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="registration.php">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
					</div>		
				</div>

			</div>
		</div>
		
	
	</body>
	<!-- end: BODY -->
</html>
</body>
</html>