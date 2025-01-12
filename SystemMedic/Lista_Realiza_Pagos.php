<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pagos </title>
   
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
		<link rel="stylesheet" href="./css/Pagos.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

</head>
<?php include './Logica/Sessiones.php';
include './Logica/ConexionBD.php';
include './Logica/Busca_Cita_Pago.php';
?>

    <style>
        .Cont_Buy{
            background-color: blue;
            height: 80vh;
            width: 100%;
        }
    </style>
	<?php include './Modal_Seleccionar_Met_Pago.php'; ?>
    <!-- Button to trigger the modal -->
	<div id="app">		
<?php include('./sidebar.php');?>
			<div class="app-content">
						<?php include('./header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="Panel_Pago" >
				<div class="Vent1" >
					<!--Identificacion -->
					<?php
					include './Logica/ConexionBD.php';
					include './Logica/Busca_Cita_Pago.php';
					?>
				<form   method="get">
				<h1>Identificación Cita</h1>
				<p>Numero de Cita </p>
				<input type="Number" name="id_cita" placeholder="Ingrese el id de la cita">
				<p>Fecha de Creación</p>
				<input type="date" name="fecha_cita" placeholder="Ingrese la fecha de pago">
			<p>Listado de Citas por Confirmar</p>
			<button type="submit" name="B_Cita_Pag" >Buscar Cita</button>
				<table class="table table-hover" style="overflow:auto; height :auto" >
					<thead>
						<tr>
							<th class="center" >Numero cita</th>
							<th class="hidden-xs" >Estado</th>
							<th>Fecha de Creacion</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						
						if($ejecutar!=false ){
							if($ejecutar->num_rows==0){
								echo "<tr><td colspan='4'>No se encontraron Registros</td></tr>";
							

							}
							while ($fila=$ejecutar->fetch_assoc()) {
								
								?>
								<tr>
									<td class="center"><?php echo $fila['Numero_Cita'] ?></td>
									<td class="hidden-xs"><?php echo $fila['Estado'] ?></td>
									<td> <?php echo $fila['Fecha_Creacion'] ?></td>
									<td> <?php echo $fila['Precio'] ?></td>
								</tr>

									<?php
							}




						} ?>
					</tbody>
				</table>
				
				</form>
				</div>
				<div class="Vent2" >
				<Detalles>
					<div>
					<h1>Informacíon Comprobánte Pago
					</h1>
					<?php
					include './Logica/ConexionBD.php';
					include './Logica/Busca_Cita_Pago.php';
					$blockpago="disabled";
					if($ejecutar !=false){
					$blockpago ="";
					while ($filas=$ejecutar->fetch_assoc()) {
						
					?>
					
					<p>Numero de Cita </p>
					<input type="text" value="<?php echo $filas['Numero_Cita'] ?>" readonly >
					<p>Paciente Beneficiado  </p>
					<input type="text" name="" value="<?php echo $filas['ID_Paciente'] ?>" readonly id="">
					<p>Fecha de Cita</p>
					<input type="date" name="" value="<?php echo $filas['Fecha_Cita'] ?>" readonly id="">
					<p>Doctor</p>
					<input type="text" value="<?php echo $filas['Nombre_Doctor']." ".$filas['Apellidos_Doctor'] ?>" readonly >
					<p>Horario</p>
					<input type="text" value="<?php echo $filas['Hora_Cita'] ?>" readonly >
					
					</div>
					<div>
					<p>Estado de Cita</p>
					<marquee behavior="" direction=""><p style="Color:Green" ><?php echo $filas['Estado'] ?>  </p></marquee>
					
					<?php
					}
				}else{
					echo "No hay datos";
				}
					?>
					<h4>Seleccionar Forma de Pago</h4>
					<button <?php echo $blockpago ?> type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					Buscar Opciones
					</button>
				</div>
				</Detalles>
				
				</div>
				</div>		

			</div>
			<!-- incluimos el archivo del footer  -->
            <?php include('./footer.php');?>
			<!-- termina: FOOTER -->
			
			<!-- incluimos las opciones  -->
	<?php include('./setting.php');?>
		
			<!-- final opciones -->
		</div>
			<!-- start: FOOTER -->
	
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	












    
<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="./js/TarjetasSimulacion.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
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
</body>
</html>