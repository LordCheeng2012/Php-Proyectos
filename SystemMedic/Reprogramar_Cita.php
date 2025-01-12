<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="vendor\sweetalert\ie9.css">
	<link rel="stylesheet" href="vendor\sweetalert\sweet-alert.css">
	<script src="vendor\sweetalert\sweet-alert.js"></script>
	<script src="vendor\sweetalert\sweet-alert.min.js"></script>
	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
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
	<title>Reprogramar Citas</title>
</head>

<body>
	<?php
	if(isset($_GET['Result'])){
		$Tipo=$_GET['Tipo'];
		$MensajeModal=$_GET['Modal_Mensaje'];
		$Detalle=$_GET['Modal_Detalle'];
		$Numero_Cita=$_GET['Numero_Cita'];
		$ID_Cita=$_GET['ID_Doctor'];
	}
	?>
	<script>
		var tipo=<?php echo $Tipo; ?>;
		var mensajeModal=<?php echo $MensajeModal; ?>;
		var detalle=<?php echo $Detalle; ?>;
		var numero_cita=<?php echo $Numero_Cita; ?>;
		var id_Doctor=<?php echo $ID_Cita; ?>;

		if(tipo=='success'){
			swal({
					title: mensajeModal,
					text: detalle + " Ten en cuenta que la cita sera actualizada y debera ser en un horario disponible del doctor,de lo contrario pasado 3 Dias se eliminara la cita",
					type: tipo, // Puedes usar 'success', 'error', 'warning', 'info'
					showCancelButton:true,
					confirmButtonColor: "#4CAF50",
					confirmButtonText: "Sí,Continuar",
					closeOnConfirm: true,
					closeOnCancel:true,
					cancelButtonText:"Cancelar"

				},
					function (isConfirm) {

						if (isConfirm != undefined || isConfirm != null) {
							if (isConfirm == true) {
								window.location.href = "./Registrar_Cita.php?Numero_Cita="+
								numero_cita+"&ID_Doctor="+id_Doctor+"&Peticion='Repro'"; 
							}
						}

					}

				);

		}else{
			swal({
					title: mensajeModal,
					text: detalle,
					type: tipo, // Puedes usar 'success', 'error', 'warning', 'info'
					confirmButtonColor: "#4CAF50",
					confirmButtonText: "ok",
					closeOnConfirm: false
				});
		}
	</script>
	</script>


	<?php
	include ("./Logica/Sessiones.php");
	?>

	<div id="app">
		<?php include ('./sidebar.php'); ?>
		<div class="app-content">
			<?php include ('./header.php'); ?>
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">User:<?php echo $ID_Paciente; ?> | Book Appointment</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>User</span>
								</li>
								<li class="active">
									<span>Book Appointment</span>
								</li>
							</ol>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Book Appointment</h5>
												<br>
												<div class="form-group Mrg">
													<h4>Reprogramar Cita</h4>
													<style>
														.Form_Busqueda {
															height: 35vh;
															background-color: #f3f3f3;

														}

														.Form_Busqueda div {
															margin: 10px;
															height: 80%;

														}

														.Resultado_Busqueda {
															background-color: 0;
															padding: 10px;
															border: 1px solid #ccc;
															border-radius: 5px;
															margin-bottom: 10px;
															position: absolute;
															z-index: 1;
															height: 280%;
															width: 171%;
															top: -100%;
															left: -45px;
															display: flex;
															align-items: center;
															justify-content: center;
															transition: background-color 1s ease;
															opacity: 0;
															pointer-events: none;
														}

														.Activo {
															background-color: #0908088f;
															opacity: initial;
															pointer-events: initial;

														}
													</style>

													<form action="./Logica/Reprogramar_Cita_Data.php" method="get">
														<div class="Form_Busqueda">
															<div>
																<p>Ingrese Numero de Cita</p>
																<input type="number" name="ID_Cita">
																<button name="Busca_ReprogramarCita"
																	type="submit">Buscar Cita</button>
															</div>
														</div>
													</form>

													<div id="Modal" class="Resultado_Busqueda">

													</div>

												</div>
											</div>

										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
					<!-- incluimos el archivo del footer  -->
					<?php include ('./footer.php'); ?>
					<!-- termina: FOOTER -->

					<!-- incluimos las opciones  -->
					<?php include ('./setting.php'); ?>
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
					jQuery(document).ready(function () {
						Main.init();
						FormElements.init();
					});
				</script>

				<!-- end: JavaScript eventos de pagina  -->


				<!-- final js -->
</body>

</html>