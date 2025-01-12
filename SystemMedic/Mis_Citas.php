<!DOCTYPE html>
<?php include('./Logica/Sessiones.php');

//recibir Eliminar Mensaje




?>


<html lang="en">

	<head>

		<title>User <?php echo $ID_Paciente ?> | Appointment History</title>
		
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
	</head>
	<body>
		<?php 
		
		if (isset($_GET['Msg'])){
			
			$msg = $_GET['Msg'];
		echo "<script>
		alert('$msg');
		</script>";
		// Redirige a la misma página sin parámetros
		header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
		
		}
		
		?>
	<!-- Modal -->
<?php 
if(isset($_GET['DeleteActive'])){
include './Modal_EliminarCita.php'; 
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
									<h1 class="mainTitle">User  <?php echo $ID_Paciente ?>  | Appointment History</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User </span>
									</li>
									<li class="active">
										<span>Appointment History</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<!--AQUI CREAREMOS EL PANEL DE BUSQUEDAS , DONDE PODREMOS BUSCAR , FILTRAR DATOS-->

<style>
	.Cont_Busqueda{
		background-color: #f7f7f8;
    	height: 10vh;
    	width: 100%;
    	border: solid 1px;
	}
	.Cont_Busqueda form{
		display: flex;
		flex-direction: row;
	}
	.Items{
		height: 9.5vh;
    width: 15%;
    background-color: #d4d4df;
    border: 1px solid white;
	display: flex;
	flex-direction: column;
	}
	.Items button{
		background-color: cornflowerblue;
		border: 0;
		height: 5vh;
		color: white;
	}
	.Items button:hover{
		background-color: white;
		color: black;
	}
</style>
<h1>Busqueda de Historial de Citas</h1>
			     <div class="Cont_Busqueda" >
					
					<form action="#" method="post">
					<div class="Items">
						<label for="Select_Esp">Especialidad:</label>
						<select name="Select_Esp" id="">
							<option value="">Todos</option>
							<?php
							  include('./Logica/ConexionBD.php');
							 $Cons_Espec="SELECT
							  Especialidad
							 FROM doctores 
							 ;";
						$Res=$ObjetoConexion->query($Cons_Espec);
						if ($Res==false) {
							
							echo "<br> Error en la obtencion de data";
						}	
							while ($Espe=$Res->fetch_assoc()) {
								$Especialidad=$Espe['Especialidad'];
								?>
								<option value="<?php echo $Especialidad ?>"><?php echo $Especialidad ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="Items">
						<label for="Fecha">Estado</label>
						<select name="EST" id="">
							<option value="">Todos</option>
							<option value="En Cola :Aun Falta Cancelar">Pendiente-pago</option>
							<option value="Atentido">Atendido</option>
							<option value="Programada-Confirmada">Confirmados</option>
							<option value="Cancelado">Cancelado</option>
						</select>
					</div>
					<div class="Items">
						<label for="Fecha">Fecha de Cita</label>
						<input type="date" name="Fecha_Cita" id="">
					</div>
					<div class="Items" >
							<label for="Select_Cita">ID_Cita:</label>
							<input type="number" name="Id_Cita">
					</div>
					<div class="Items">
						<label for="Hora Cita">Hora de Fecha</label>
						<select name="Hora_Cita" >
							<option value="">Horarios</option>
							<?php
							 $hora=new DateTime();
							 $Horarios=array
							 //mostramos en formato 12 horas con am y pm
							 ($hora->setTime(7,0,0)->format('h:i: A').'-'.$hora->setTime(8,0,0)->format('h:i: A'),
							 $hora->setTime(9,0,0)->format('h:i: A').'-'.$hora->setTime(10,0,0)->format('h:i: A'),
							 $hora->setTime(11,0,0)->format('h:i: A').'-'.$hora->setTime(12,0,0)->format('h:i: A'),
							 $hora->setTime(14,0,0)->format('h:i: A').'-'.$hora->setTime(15,0,0)->format('h:i: A')                            
								 );
							 $Consulta="SELECT 
							 Hora_Cita FROM lista_citas WHERE 
							 ID_Doctor='$Doctor_Select'AND Fecha_Cita = '$Fecha_Cita_Consulta'";
						   
						 $Res=$ObjetoConexion->query($Consulta);
						 if ($Res==false) {
							 echo "<script>alert('Hubo un error en la obtencion de datos linea
							  139'".$ObjetoConexion->error. ")</script>";
						 }else{
							 $hor_Res=array();
						   while($Data=$Res->fetch_assoc()){
							$hor_Res[]=$Data['Hora_Cita']; 
						   }
						   for($i=0 ; $i<=count($Horarios)-1 ; $i++){
							if($Res->num_rows==0){
								$mensaje="";
							}
						
						   
								  ?>
								  <option value="<?php echo $Horarios[$i];  ?>"  > <?php echo $Horarios[$i] ;if($Horarios[$i]==$hor_Res[$i]){echo " | ".$mensaje;} ?></option>
						<?php
						   }}
							 ?>
						</select>
					</div>
					<div class="Items">
						<label for="Doctor">Doctores</label>
						<select name="Doctor" id="">
							<option value="">Todos</option>
						<?php
						$Cons_Espec="SELECT
							  ID_DOC,Nombres,Apellidos
							 FROM doctores 
							 ;";
						$Doc=$ObjetoConexion->query($Cons_Espec);
						if ($Doc==false) {
							
							echo "<br> Error en la obtencion de data".mysqli_error($ObjetoConexion) ;
						}	
							while ($Fl=$Doc->fetch_assoc()) {
								$Nombres=$Fl['Nombres'];
								$Apellidos=$Fl['Apellidos'];
								$ID_Doc=$Fl['ID_DOC'];
								?>
								<option value="<?php echo $ID_Doc ?>"><?php echo $Nombres."-".$Apellidos ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="Items">
						<button name="Buscar_Cit" type="submit">Buscar</button>
					</div>
					</form>
			  </div>
				

						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12" style="overflow:auto ; height:40vh" >
									
									<p style="color:red;">Usuario</p>	
									<table  class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">Numero Cita</th>
												<th class="hidden-xs">Doctor Name</th>
												<th>Specialization</th>
												<th>Consultancy Fee</th>
												<th>Appointment Date / Time </th>
												<th>Appointment Creation Date  </th>
												<th>Current Status</th>
												<th>Resultados</th>
												<th>Action</th>		
											</tr>
										</thead>
										<tbody >
											
										<?php include('./Logica/Busquedas.php');

				//este archivo tiene un array que nosotros vamos a 
				//iterar para mostrar los resultados
				if (is_array($Resultados)) {

				//si es un array entonces iterar sobre ella
					foreach($Resultados as $Data){
						?>
						
											<tr>
												<td class="center"><?php echo $Data['id_cita'] ?></td>
												<td class="hidden-xs">
												<?php echo $Data['Nombres_Doctors'] ?>
												</td>
												<td><?php echo $Data['Especialidad'] ?></td>
												<td><?php echo $Data['Precio'] ?></td>
												<td>
												<?php echo $Data['Fecha_Cita']."/".$Data['Hora_Cita'] ?>
												</td>
												<td><?php echo $Data['Fecha_Creacion'] ?></td>
												<td>
													<p <?php if($Data['Estado']=="Cita Vencida"){echo " style='Color:Red'";} ?> >
												<?php echo $Data['Estado'] ?></p>
                                                </td>
												<td>
												<a href="./Logica/Eliminar_Citas.php?Id_cita=<?php echo $Data['id_cita'] ?>" class="btn btn-danger" >    <i class="fa fa-trash"></i> Eliminar
<a/>

												</td>
												
												<td>
												<a onclick=" return confirm('si la fecha de su cita aun no se vence puede cancelar la peticion')"
													 href="./Logica/Reprogramar_Cita_Data.php?Busca_ReprogramarCita=''&ID_Cita=<?php echo $Data['id_cita'] ?>">Reprogramar Cita <i class="ti-pencil"></i> </a>
												</td>
													
												
											</tr>
										
									
			
											<?php
											
																	
					}
				}else{
					?>

					<td>
					<?php echo $Resultados ?>
					<script>
							alert('<?php echo $Busqueda ?>')
						</script>
					</td>
					<?php
					
				}
				?>	
				</tr>		
					</tbody>
									</table>
								</div>
								

							</div>
								</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
					</div>
				</div>
			</div>
			
			
			<!-- start: FOOTER -->
	<?php include('./footer.php');
	
	?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('./setting.php');


	?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<?php 
				
if(isset($_GET['DeleteActive'])){
	?>
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Verificar si la variable de PHP indica que el modal debe mostrarse
       
    
            $('#deleteModal').modal('show');
        
    });
</script>
	<?php 
}
			?>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
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



		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
