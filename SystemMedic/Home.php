<!DOCTYPE html>
<?php include('./Logica/Sessiones.php');
if (isset($_GET['Msg'])){
	$msg = $_GET['Msg'];
echo "<script>
alert('$msg');
</script>";
}
?>

<html lang="en">
	
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>User  | Dashboard</title>
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="./css/Modal_Notificacion.css">
	</head>
	<body>
	<script>
				//en js creamos una variable usando Let , luego creamos una instancia
				//de la clase de la urlSerachParams que sirve para extraer valores del Get
				//url--Como Parametro ponemos la url actual donde
				//Windows->Objeto
				//location->Propiedad
				//Search->Propiedad del objeto Location=Donde obtiene 
				//la cadena Url actual
				let msg=new URLSearchParams(window.location.search);
				//Var: otra forma de crear variable tanto como let y var son flexibles
				//y pueden cambiar
				var ValorpAR=msg.get('User');
				window.addEventListener('load',function () {
					if (ValorpAR==null) {
						console.log('Logueado');
					}else{
					alert("Bienvenido Usuario:"+ValorpAR);
					}
				})

			</script>
			<?php
			if (isset($_GET['ID_Pac'])) {
			//Obtenemos la variable Session
			$ID_Paciente=$_GET['ID_Pac'];
			}

			//Verificar si hay variables get con el nombre mensaje , es al variable que manda 
			//cuando se ah hecho un proceso
			if (isset($_GET['Mensaje'])) {
				$AbrirModal=true;
				//Obtenemos la variable Session
				$Mensage=$_GET['Mensaje'];
				echo "<script>
				alert('$Mensage');
			</script>";
			$Fecha_Cita=$_GET['Fecha_Cita'];
			$Hora_Cita=$_GET['hora_cita'];
			$ID_Cita=$_GET['id_cita'];
			$Especialidad=$_GET['Especialidad'];
			$Doctor=$_GET['Doctor'];
			//si se registra la cita mostrar el modal
			include('./Resultado_Registro_Cita.php');
				}elseif(isset($_GET['FatalErr'])){
					$Mensage=$_GET['FatalErr'];
				echo "<script>
				alert('$Mensage');
			</script>";
				}else {
					echo "No se encontro el detalle del error";
				}
				
			?>
			
		<div id="app">		
<?php include('./sidebar.php');?>
			<div class="app-content">
						<?php include('./header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User : <?php echo $ID_Paciente;?> | Dashboard</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Mi Perfil</h2>
											
											<p class="links cl-effect-1">
												<a href="Editar_Perfil.php">
													Actualizar Perfil
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Mis Citas</h2>
										
											<p class="cl-effect-1">
												<a href="Mis_Citas.php">
													Historial de Citas
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle"> Reserva Cita</h2>
											
											<p class="links cl-effect-1">
												<a href="./Registrar_Cita.php">
													Reservar Una Cita con un Doctor
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>			
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- incluimos el archivo del footer  -->
	<?php include('./footer.php');?>
			<!-- termina: FOOTER -->
			<?php 
	include('./Modal_Update_Data.php');
	?>
			<!-- incluimos las opciones  -->
	<?php include('./setting.php');?>
			<>
			<!-- final opciones -->
		</div>
		<!-- start: scripts de  JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUERIDOS SOLO EN ESTA PAGINA -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript eventos de pagina  -->
	

		<!-- final js -->
	</body>
</html>
