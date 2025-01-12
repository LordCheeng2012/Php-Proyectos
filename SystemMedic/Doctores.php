<!DOCTYPE html>
<?php include('./Logica/Sessiones.php');
if (isset($_GET['FatalErr'])){
    $Mensage=$_GET['FatalErr'];
echo "<script>
alert('$Mensage');
</script>";} ?>
<html lang="en">

	<head>
		<title>User <?php echo $ID_Paciente ?> | Informacion Doctores</title>
		
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
									<h1 class="mainTitle">User  <?php echo $ID_Paciente ?>  | Lista de Doctores</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User </span>
									</li>
									<li class="active">
										<span>Informacion Doctores</span>
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
    width: 100%;
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
<h1>Informacion Doctores  </h1>
			     <div class="Cont_Busqueda" >
				
					<form action="#" method="post">
					<div class="Items">
						<label for="Select_Esp">Especialidad:</label>
						<select name="Select_Esp" id="">
							<option value="">Todos</option>
							<?php
							   include './Logica/Busquedas.php';
							  include('./Logica/ConexionBD.php');
							 $Cons_Espec="SELECT
							  Especialidad
							 FROM doctores 
							 ;";
							 //ejecuto la consulta
						$Res=$ObjetoConexion->query($Cons_Espec);
						if ($Res==false) {
							
							echo "<br> Error en la obtencion de data";
						}	
							while ($Espe=$Res->fetch_assoc()) {
								$Especialidad=$Espe['Especialidad'];
								?>
								<option value="<?php echo $Especialidad ?>">
								<?php echo $Especialidad ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="Items" >
							<label for="Select_Cita">Sexo:</label>
							<select name="Sel_Sex" >
								<option value="">Todos</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>

							</select>
					</div>
					
					<div class="Items">
						<label for="Doctor">Doctores</label>
						<select name="id_doctor" id="">
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
						//este bucle imprime las opciones
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
						<button name="Busca_Doc" type="submit">Buscar</button>
					</div>
					</form>
			  </div>
				


            
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12" style="overflow:auto ; height:40vh" >
									
									<p style="color:red;">Usuario</p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">ID Doctor</th>
												<th class="hidden-xs">Doctor Name</th>
												<th>Specialization</th>
												
												<th>Edad</th>
												<th>Sexo  </th>	
											</tr>
										</thead>
										<tbody  >
                                            <?php
	//Aqui se ejecuta la cadena		
	include './Logica/ConexionBD.php';									 
   $Res=mysqli_query($ObjetoConexion,$query); 
    if($Res->num_rows==0){
    $mostrar="Aun no hay Registros : ";
    }
                                            ?>
                                            <tr>
                                            <?php
                                            if(isset($mostrar)){
                                                echo "<td>".$mostrar."<td/>";
                                            } else{
                                                while($Data = $Res->fetch_assoc()) {
                                                ?>

<td><?php echo $Data['ID_DOC']; ?></td>
<td><?php echo $Data['Nombres']." ".$Data['Apellidos'] ?></td>
<td><?php echo $Data['Especialidad']; ?></td>
<td><?php echo $Data['Edad'] ?></td>
<td><?php echo $Data['Sexo'] ?></td>
<td><a href="Registrar_Cita.php?Numero_Cita=''&ID_Doctor=<?php echo $Data['ID_DOC']; ?>">Registrar Cita</a></td>

</tr>
							<?php }} ?>

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
	<?php include('./footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('./setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
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
